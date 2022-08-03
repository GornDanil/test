<?php

namespace App\Console;

use App\Models\Paste;
use Carbon\Carbon;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * @param Schedule $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        $schedule->call(function () {
            // Удаляем посты с истекшим сроком публикации
            Paste::query()->where('expiration', '1')->where('created_at', '<=', Carbon::now()->subMinutes(10)->toDateTimeString())->delete();
            Paste::query()->where('expiration', '2')->where('created_at', '<=', Carbon::now()->subMinutes(60)->toDateTimeString())->delete();
            Paste::query()->where('expiration', '3')->where('created_at', '<=', Carbon::now()->subMinutes(180)->toDateTimeString())->delete();
            Paste::query()->where('expiration', '4')->where('created_at', '<=', Carbon::now()->subDay()->toDateTimeString())->delete();
            Paste::query()->where('expiration', '5')->where('created_at', '<=', Carbon::now()->subWeek()->toDateTimeString())->delete();
            Paste::query()->where('expiration', '6')->where('created_at', '<=', Carbon::now()->subMonth()->toDateTimeString())->delete();
        })->everyMinute();


    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__ . '/Commands');

        require base_path('routes/console.php');
    }
}
