<?php

namespace App\Services\Authentication\Abstracts;

interface AuthenticationServiceInterface
{
    /**
     * @param array $request
     * @return mixed
     */
    public function registration(array $request);

    /**
     * @param array $request
     * @return mixed
     */
    public function login(array $request);


}
