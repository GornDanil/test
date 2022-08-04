<?php


namespace App\Exceptions;

class AuthontificationException extends BaseException
{
    /** @var array|string[] */
    protected array $errors = ['email' => 'Неправильный логин или пароль'];
    protected int $statusCode = 403;
}
