<?php

namespace App\Services;

use App\Models\User;
use App\Models\UserTokenHistory;
use Illuminate\Support\Facades\DB;

class AchatJetonsService
{
    public function credit(User $user, int $jetons, string $source, array $meta = [])
    {
        DB::transaction(function () use ($user, $jetons, $source, $meta) {

            $before = $user->jetons;

            $user->increment('jetons', $jetons);

            UserTokenHistory::create([
                'user_id'         => $user->id,
                'previous_jetons' => $before,
                'new_jetons'      => $before + $jetons,
                'delta'           => $jetons,
                'source'          => $source, // stripe | crypto
                'meta'            => json_encode($meta),
            ]);
        });
    }
}
