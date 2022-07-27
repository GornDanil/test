<?php

namespace App\Services\Authentication\Abstracts;

use App\Models\User;
use Illuminate\Support\Collection;

interface AuthenticationServiceInterface
{

    public function registration(array $request);


    public function login(array $request);


}
