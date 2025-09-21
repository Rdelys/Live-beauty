<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\ShowPrive;
use Carbon\Carbon;

class UpdateShowStatus extends Command
{
    protected $signature = 'shows:update-status';
    protected $description = 'Met à jour le statut des shows privés lorsque la date et heure de fin est dépassée';

    public function handle()
    {
        $now = Carbon::now();

        $updated = ShowPrive::where('etat', '!=', 'Terminé')
            ->whereRaw("STR_TO_DATE(CONCAT(date, ' ', fin), '%Y-%m-%d %H:%i:%s') <= ?", [$now])
            ->update(['etat' => 'Terminé']);

        $this->info("Shows mis à jour : {$updated}");
    }
}
