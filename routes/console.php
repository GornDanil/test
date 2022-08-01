<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;

/*
|--------------------------------------------------------------------------
| Console Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of your Closure based console
| commands. Each Closure is bound to a command instance allowing a
| simple approach to interacting with each command's IO methods.
|
*/

Artisan::command("debug", function () {
    \Illuminate\Support\Facades\Lang::setLocale("en");
    $data = ['email' => 'dfdsf', 'password' => 'sadfsadf', 'created_at' => '21.10.2021'];
    $newData = new \App\Domain\DTO\LoginDTO($data);
    dd($newData);
});

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote');
