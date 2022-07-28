<?php

namespace App\Http\Controllers;

use App\Services\Authentication\Abstracts\AuthenticationServiceInterface;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /** @var AuthenticationServiceInterface */
    private AuthenticationServiceInterface $service;

    /**
     * @param AuthenticationServiceInterface $service
     */
    public function __construct(AuthenticationServiceInterface $service)
    {
        $this->service = $service;
    }

    /**
     * @return Application|Factory|View
     */
    public function viewLogin()
    {
        return view("login");
    }

    /**
     * @param Request $request
     * @return Application|RedirectResponse|Redirector
     */
    public function login(Request $request)
    {

        if (Auth::attempt($this->service->login($request))) {
            return redirect()->intended(route('user.private'));
        }

        return redirect(route('user.login.view'))->withErrors([
            'email' => 'Не удалось авторизироваться'
        ]);
    }

    /**
     * @param Request $request
     * @return Application|RedirectResponse|Redirector
     */
    public function logout(Request $request)
    {
        Auth::logout();
        return redirect('/');
    }
}
