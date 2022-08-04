<?php

namespace App\Services\Authentication\Abstracts;

use App\Domain\DTO\LoginDTO;
use App\Domain\DTO\RegistrationDTO;
use App\Models\User;
use Illuminate\Support\Collection;

interface AuthenticationServiceInterface
{
    /**
     * @param RegistrationDTO $data
     * @return User
     */
    public function registerUser(RegistrationDTO $data): User;

    /**
     * @param LoginDTO $data
     * @return User
     */
    public function login(LoginDTO $data): User;
}
