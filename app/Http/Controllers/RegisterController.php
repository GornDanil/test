<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuthRequest;
use App\Models\User;
use App\Services\Authentication\Abstracts\AuthenticationServiceInterface;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    private AuthenticationServiceInterface $service;

    public function __construct(AuthenticationServiceInterface $service)
    {
        $this->service = $service;
    }

    public function save(AuthRequest $request)
    {
        if (Auth::check()) {
            return redirect(route('user.private'));
        }
        $request = $request->validated();
        if (User::where('email', $request['email'])->exists()) {
            return redirect(route('user.registration.get'))->withErrors([
                'email' => 'Такой пользователь уже зарегистрирован'
            ]);
        }

        if ($this->service->registration($request)) {

            return redirect(route('user.private'));
        }
        return redirect(route('user.login.view'))->withErrors([
            'formError' => 'Произошла ошибка при сохранении пользователя'
        ]);
    }

    public function authLog(AuthRequest $request)
    {
        dd(1);
    }
}
