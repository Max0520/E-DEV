<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    protected $commands = [
        // Déclare ta commande ici si ce n'est pas déjà fait
        \App\Console\Commands\FetchContactReplies::class,
    ];

    protected function schedule(Schedule $schedule)
    {
        // Exécuter toutes les minutes
        $schedule->command('contacts:fetch-replies')->everyMinute();
    }

    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
