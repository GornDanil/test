<?php

namespace App\Services\Authentication;

use App\Models\User;
use App\Services\Authentication\Abstracts\AuthenticationServiceInterface;
use Illuminate\Support\Facades\Auth;
class AuthenticationService implements AuthenticationServiceInterface
{

    public function registration($request)
    {
        $user = User::create($request);
        if ($user) {
            Auth::login($user);

        }
        return $user;
    }

    public function login($request)
    {

        $formFields = $request->only(['email', 'password']);

        return $formFields;
    }
}
