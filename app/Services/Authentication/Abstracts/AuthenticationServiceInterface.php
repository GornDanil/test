<?php

namespace App\Services\Authentication\Abstracts;

use App\Domain\DTO\RegistrDTO;

interface AuthenticationServiceInterface
{
    /**
     * @param RegistrDTO $data
     * @return mixed
     */
    public function registrationEmailValid(RegistrDTO $data);

    /**
     * @param RegistrDTO $data
     * @return mixed
     */
    public function registerUser(RegistrDTO $data);

    /**
     * @param object $data
     * @return mixed
     */
    public function login(object $data);


}
