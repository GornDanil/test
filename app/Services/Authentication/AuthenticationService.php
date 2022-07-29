<?php

namespace App\Services\Authentication;

use App\Models\User;
use App\Repositories\UserRepositoryInterface;
use App\Services\Authentication\Abstracts\AuthenticationServiceInterface;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Hash;

class AuthenticationService implements AuthenticationServiceInterface
{
    /** @var UserRepositoryInterface */
    private UserRepositoryInterface $repository;

    /** @param UserRepositoryInterface $repository */
    public function __construct(UserRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function registrationEmailValid($data)
    {
        $dataUser = $this->repository->findWhere(['email' => $data['email']]);
        return count($dataUser);

    }

    /**
     * @inheritDoc
     */
    public function registerUser($data)
    {

        $dataUser = $this->repository->findWhere(['email' => $data['email']]);

        if (count($dataUser) == 0) {

            $data['password'] = Hash::make($data['password']);

            return $this->repository->create($data);
        } else {
            return false;
        }

    }

    /**
     * @inheritDoc
     */
    public function login($data)
    {
        /** @var Collection<User> $users */
        $users = $this->repository->findWhere(['email' => $data['email']]);

        if (count($users) == 0) {
            return false;
        }

        $user = $users->first();

        if (!Hash::check($data['password'], $user->password)) {
            return false;
        }

        return $user;
    }
}
