<?php

namespace App\Services\Authentication;

use App\Domain\DTO\RegistrationDTO;
use App\Exceptions\AuthontificationException;
use App\Exceptions\EmailNotUniqueException;
use App\Models\User;
use App\Repositories\Authentication\Abstracts\UserRepositoryInterface;
use App\Services\Authentication\Abstracts\AuthenticationServiceInterface;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Hash;

class AuthenticationService implements AuthenticationServiceInterface
{
    /** @var \App\Repositories\Authentication\Abstracts\UserRepositoryInterface */
    private \App\Repositories\Authentication\Abstracts\UserRepositoryInterface $repository;

    /** @param UserRepositoryInterface $repository */
    public function __construct(UserRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    /** @inheritDoc */
    public function registerUser(RegistrationDTO $data)
    {
        $dataUser = $this->repository->findWhere(['email' => $data->email]);

        if (count($dataUser) == 0) {
            $data->password = Hash::make($data->password);
            return $this->repository->create($data->toArray());
        } else {
            throw new EmailNotUniqueException();
        }

    }

    /** @inheritDoc */
    public function login($data)
    {
        /** @var Collection<User> $users */
        $users = $this->repository->findWhere(['email' => $data->email]);

        if (count($users) == 0) {
            throw new AuthontificationException();
        }

        $user = $users->first();

        if (!Hash::check($data->password, $user->password)) {
            throw new AuthontificationException();
        }

        return $user;
    }
}
