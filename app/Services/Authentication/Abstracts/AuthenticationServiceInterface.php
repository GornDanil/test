<?php

namespace App\Services\Authentication\Abstracts;

use App\Models\User\User;
use Illuminate\Support\Collection;

interface AuthenticationServiceInterface
{
    /**
     * @param array $data
     * @return void
     */
    public function save(array $data);

    /**
     * @param string|null $email
     * @param string $password
     * @return User
     */
    public function login(?string $email,  string $password);

    /**
     * @return void
     */
    public function logout(): void;
}
