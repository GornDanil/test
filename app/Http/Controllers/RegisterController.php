<?php

namespace App\Http\Controllers;

use App\Domain\DTO\RegistrationDTO;
use App\Http\Requests\AuthRequest;
use App\Services\Authentication\Abstracts\AuthenticationServiceInterface;
use Atwinta\DTO\Exceptions\DtoException;
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
     * @return Application|RedirectResponse|Redirector
     * @throws DtoException
     */
    public function save(AuthRequest $request)
    {
        $data = $request->validated();

        $registryDTO = new RegistrationDTO($data);

        $user = $this->service->registerUser($registryDTO);

        Auth::login($user);

        return redirect(route('user.login.view'));
    }

}
