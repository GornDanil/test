<?php

namespace App\Http\Controllers;

use App\Domain\DTO\LoginDTO;
use App\Http\Requests\LoginRequest;
use App\Services\Authentication\Abstracts\AuthenticationServiceInterface;
use Atwinta\DTO\Exceptions\DtoException;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /** @var AuthenticationServiceInterface */
    private AuthenticationServiceInterface $service;

    /** @param AuthenticationServiceInterface $service */
    public function __construct(AuthenticationServiceInterface $service)
    {
        $this->service = $service;
    }

    /**
     * @param LoginRequest $request
     * @return RedirectResponse
     * @throws DtoException
     */
    public function login(LoginRequest $request): RedirectResponse
    {
        $data = $request->validated();
        $loginDTO = new LoginDTO($data);
        $user = $this->service->login($loginDTO);
        Auth::login($user);
        return redirect()->intended(route('user.private'));
    }

    /** @return Application|RedirectResponse|Redirector */
    public function logout()
    {
        Auth::logout();
        return redirect(route('home'));
    }
}
