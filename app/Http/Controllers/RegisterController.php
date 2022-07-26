<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuthRequest;
use App\Services\Authentication\Abstracts\AuthenticationServiceInterface;
use App\Services\User\Abstracts\UserServiceInterface;
use Auth;




class RegisterController extends Controller
{
    public function __construct(
        AuthenticationServiceInterface $authenticationService)
    {
        $this->authenticationService = $authenticationService;
    }
    public function save(AuthRequest $request)
    {

        $validateFields = $request->validated();
        $this->authenticationService->save($validateFields);
    }
}
