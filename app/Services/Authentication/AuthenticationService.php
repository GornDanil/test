<?php

namespace App\Services\Authentication;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthenticationService implements AuthenticationServiceInterface
{
    public function save(Request $request)
    {
        if (Auth::check()) {
            return redirect(route('user.private'));
        }
        /**
         *
         */
        if (User::where('email', $validateFields['email'])->exists()) {
            return redirect(route('user.registration'))->withErrors([
                'email' => 'Такой пользователь уже зарегистрирован'
            ]);
        }
        $user = User::create($validateFields);
        if ($user) {
            Auth::login($user);
            return redirect(route('user.private'));
        }
        return redirect(route('user.login'))->withErrors([
            'formError' => 'Произошла ошибка при сохранении пользователя'
        ]);
    }

    public function login(Request $request)
    {
        if (Auth::check()) {
            return redirect()->intended(route('user.private'));
        }
        $formFields = $request->only(['email', 'password']);

        if (Auth::attempt($formFields)) {
            return redirect()->intended(route('user.private'));
        }

        return redirect(route('user.login'))->withErrors([
            'email' => 'Не удалось авторизироваться'
        ]);
    }
}
