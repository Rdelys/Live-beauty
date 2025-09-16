<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ArchiveFinishedShows extends Command
{
    protected $signature = 'shows:archive-finished';
    protected $description = 'Archive et supprime les shows privés terminés';

    public function handle()
    {
        $now = Carbon::now();

        $finishedShows = DB::table('show_prives')
            ->where(function ($query) use ($now) {
                $query->where('date', '<', $now->toDateString())
                      ->orWhere(function($q) use ($now) {
                          $q->where('date', $now->toDateString())
                            ->where('fin', '<=', $now->toTimeString());
                      });
            })
            ->get();

        foreach ($finishedShows as $show) {
            // Copier dans l'historique
            DB::table('historique_show_prives')->insert([
                'show_prive_id' => $show->id,
                'user_id' => $show->user_id,
                'modele_id' => $show->modele_id,
                'date' => $show->date,
                'debut' => $show->debut,
                'fin' => $show->fin,
                'duree' => $show->duree,
                'jetons_total' => $show->jetons_total,
                'etat' => $show->etat,
                'is_active' => $show->is_active,
                'is_live' => $show->is_live,
                'room_key' => $show->room_key,
                'access_token' => $show->access_token,
                'socket_room' => $show->socket_room,
                'broadcaster_socket_id' => $show->broadcaster_socket_id,
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            // Supprimer le show
            DB::table('show_prives')->where('id', $show->id)->delete();
        }

        $this->info("✅ " . count($finishedShows) . " shows archivés et supprimés.");
    }
}
