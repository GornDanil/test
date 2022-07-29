<?php

namespace App\Services\Authentication\Abstracts;

interface AuthenticationServiceInterface
{
    /**
     * @param $data
     * @return mixed
     */
    public function registrationEmailValid($data);

    /**
     * @param array $data
     * @return mixed
     */
    public function registerUser(array $data);

    /**
     * @param array $data
     * @return mixed
     */
    public function login(array $data);


}
