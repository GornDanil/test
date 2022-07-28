<?php

namespace App\Services\Authentication;

use App\Services\Authentication\Abstracts\AuthenticationServiceInterface;
use App\Repositories\UserRepositoryInterface;
use Illuminate\Support\Facades\Auth;

class AuthenticationService implements AuthenticationServiceInterface
{
    private UserRepositoryInterface $repository;

    public function __construct(UserRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @param $request
     * @return mixed
     */
    public function registration($request)
    {
        $user = $this->repository->create($request);
        if ($user) {


        }
        return $user;
    }

    /**
     * @param $request
     * @return mixed
     */
    public function login($request)
    {

        $formFields = $request->only([ 'email', 'password']);

        return $formFields;
    }
}
