<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use Carbon\Carbon;
use App\Models\Paste;
class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        $schedule->call(function() {
            // Удаляем посты с истекшим сроком публикации
            Paste::where('expiration', '1')->where('created_at', '<=', Carbon::now()->subMinutes(10)->toDateTimeString())->delete();
            Paste::where('expiration', '2')->where('created_at', '<=', Carbon::now()->subMinutes(60)->toDateTimeString())->delete();
            Paste::where('expiration', '3')->where('created_at', '<=', Carbon::now()->subMinutes(180)->toDateTimeString())->delete();
            Paste::where('expiration', '4')->where('created_at', '<=', Carbon::now()->subDay()->toDateTimeString())->delete();
            Paste::where('expiration', '5')->where('created_at', '<=', Carbon::now()->subWeek()->toDateTimeString())->delete();
            Paste::where('expiration', '6')->where('created_at', '<=', Carbon::now()->subMonth()->toDateTimeString())->delete();
        })->everyMinute();
        
        


    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
