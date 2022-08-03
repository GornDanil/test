<?php

namespace App\Services\Authentication\Abstracts;

use App\Domain\DTO\RegistrationDTO;

interface AuthenticationServiceInterface
{
    /**
     * @param RegistrationDTO $data
     * @return mixed
     */
    public function registerUser(RegistrationDTO $data);

    /**
     * @param object $data
     * @return mixed
     */
    public function login(object $data);
}
