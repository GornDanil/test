<?php

namespace App\Http\Controllers;

use App\Exceptions\EmailNotUniqueException;
use App\Http\Requests\AuthRequest;
use App\Services\Authentication\Abstracts\AuthenticationServiceInterface;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
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
     * @param AuthRequest $request
     * @return Application|RedirectResponse|Redirector|void
     */
    public function save(AuthRequest $request)
    {
        $data = $request->validated();
        if ($this->service->registrationEmailValid($data) != 0) {

            throw new EmailNotUniqueException();
        }
        $user = $this->service->registerUser($data);
        if ($user) {
            Auth::login($user);
            return redirect(route('user.login.view'));
        }
    }

}
