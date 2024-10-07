<?php
namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    protected $commands = [
        \App\Console\Commands\GenerateForm::class, 
    ];

    protected function schedule(Schedule $schedule)
    {
        // Jadwalkan perintah
    }

    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        // Atau, jika Anda ingin menambahkan command manual
        // $this->command(\App\Console\Commands\GenerateForm::class);
    }
}
