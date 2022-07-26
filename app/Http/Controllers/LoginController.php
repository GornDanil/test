<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
class LoginController extends Controller
{
    public function login(Request $request) {
        if(Auth::check()) {
            return redirect()->intended(route('user.private'));
        }
        $formFields = $request->only(['email', 'password']);

        if(Auth::attempt($formFields)) {
            return redirect()->intended(route('user.private'));
        }

        return redirect(route('user.login'))->withErrors([
            'email' => 'Не удалось авторизироваться'
        ]);
    }
}
