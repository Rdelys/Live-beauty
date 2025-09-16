<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class ArchiveExpiredShowPrives extends Command
{
    protected $signature = 'showprive:archive-expired';
    protected $description = 'Archiver et supprimer les shows privés expirés';

    public function handle()
    {
        $expiredShows = DB::table('show_prives')
            ->whereRaw("STR_TO_DATE(CONCAT(`date`, ' ', `fin`), '%Y-%m-%d %H:%i:%s') < NOW()")
            ->get();

        foreach ($expiredShows as $show) {
            // Archiver
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
                'created_at' => $show->created_at,
                'updated_at' => $show->updated_at
            ]);

            // Supprimer le show original
            DB::table('show_prives')->where('id', $show->id)->delete();
        }

        $this->info('✅ Shows expirés archivés et supprimés.');
    }
}
