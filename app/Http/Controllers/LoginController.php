<?php

namespace App\Http\Controllers;

use App\Services\Authentication\Abstracts\AuthenticationServiceInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    private AuthenticationServiceInterface $service;

    public function __construct(AuthenticationServiceInterface $service)
    {
        $this->service = $service;
    }

    public function viewLogin()
    {
        return view("login");
    }

    public function login(Request $request)
    {
        $user = Auth::check();
        if (Auth::check()) {
            return redirect()->intended(route('user.private'));
        }

        if (Auth::attempt($this->service->login($request))) {
            return redirect()->intended(route('user.private'));
        }

        return redirect(route('user.login.view'))->withErrors([
            'email' => 'Не удалось авторизироваться'
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        return redirect('/');
    }
}
