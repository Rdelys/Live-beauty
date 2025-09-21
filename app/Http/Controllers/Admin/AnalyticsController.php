<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ModelConnection;
use App\Models\UserTokenHistory;
use App\Models\ShowPrive;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class AnalyticsController extends Controller
{
    // Helper to build continuous date labels for N days
    protected function buildDateRange($days)
    {
        $labels = [];
        $start = Carbon::today()->subDays($days-1);
        for ($i = 0; $i < $days; $i++) {
            $labels[] = $start->copy()->addDays($i)->format('Y-m-d');
        }
        return $labels;
    }

    public function modelConnections(Request $request)
{
    $days = (int)$request->get('days', 30);
    $labels = $this->buildDateRange($days);

    $rows = \App\Models\ModeleHistorique::selectRaw('jour, COUNT(*) as count')
        ->where('jour', '>=', now()->subDays($days-1)->toDateString())
        ->groupBy('jour')
        ->orderBy('jour')
        ->get()
        ->pluck('count','jour')
        ->toArray();

    $data = array_map(function($d) use ($rows) {
        return isset($rows[$d]) ? (int)$rows[$d] : 0;
    }, $labels);

    return response()->json(['labels'=>$labels,'data'=>$data]);
}


    public function tokensPurchased(Request $request)
    {
        $days = (int)$request->get('days', 30);
        $labels = $this->buildDateRange($days);

        $rows = UserTokenHistory::selectRaw('DATE(created_at) as date, SUM(delta) as tokens_sum')
            ->where('delta','>',0)
            ->where('created_at', '>=', now()->subDays($days-1)->startOfDay())
            ->groupBy('date')->orderBy('date')->get()->pluck('tokens_sum','date')->toArray();

        $data = array_map(function($d) use ($rows) {
            return isset($rows[$d]) ? (int)$rows[$d] : 0;
        }, $labels);

        return response()->json(['labels'=>$labels,'data'=>$data]);
    }

    public function showsPerDay(Request $request)
{
    $days = (int)$request->get('days', 30);
    $labels = $this->buildDateRange($days);

    $rows = ShowPrive::selectRaw('DATE(date) as date, COUNT(*) as count, SUM(jetons_total) as total_jetons')
        ->where('date', '>=', now()->subDays($days-1)->toDateString())
        ->groupBy('date')->orderBy('date')
        ->get();

    // On prépare data + infos complémentaires
    $counts = [];
    $jetons = [];
    $details = [];

    foreach ($labels as $d) {
        $row = $rows->firstWhere('date', $d);
        $counts[] = $row ? (int)$row->count : 0;
        $jetons[] = $row ? (int)$row->total_jetons : 0;

        if ($row) {
            // récupérer tous les shows du jour
            $dayShows = ShowPrive::with(['user:id,pseudo','modele:id,prenom'])
                ->whereDate('date', $d)->get();

            $details[$d] = $dayShows->map(fn($s) => [
                'user'   => $s->user->pseudo ?? '',
                'modele' => $s->modele->prenom ?? '',
                'jetons' => $s->jetons_total,
            ]);
        } else {
            $details[$d] = [];
        }
    }

    return response()->json([
        'labels'  => $labels,
        'data'    => $counts,
        'jetons'  => $jetons,
        'details' => $details
    ]);
}

}
