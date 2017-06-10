<?php

namespace App\Console;

use App\Console\Commands\Scheduled;
use App\Console\Commands\TwitterStreaminAPI;
use App\Console\Commands\Twitter;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        //TwitterStreaminAPI::class,
        Twitter::class,
        Scheduled::class,


    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        $schedule->command('twitter')
            ->everyMinute();

        $schedule->command('TwitterStreamAPI')
            ->hourly();

        $schedule->command('scheduled')
            ->everyMinute();

    }

    /**
     * Register the Closure based commands for the appli   cation.
     *
     * @return void
     */
    protected function commands()
    {
        require base_path('routes/console.php');
    }
}
