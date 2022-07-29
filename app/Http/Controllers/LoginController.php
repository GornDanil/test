<?php

namespace App\Http\Controllers;

use App\Exceptions\EmailNotUniqueException;
use App\Http\Requests\LoginRequest;
use App\Services\Authentication\Abstracts\AuthenticationServiceInterface;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Http\RedirectResponse;
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
     * @param LoginRequest $request
     * @return RedirectResponse
     */
    public function login(LoginRequest $request): RedirectResponse
    {
        $data = $request->validated();
        $user = $this->service->login($data);
        if ($user) {
            Auth::login($user);
            return redirect()->intended(route('user.private'));
        } else {
            throw new EmailNotUniqueException();
        }
    }

    /**
     * @return Application|RedirectResponse|Redirector
     */
    public function logout()
    {
        Auth::logout();
        return redirect(route('home'));
    }
}
