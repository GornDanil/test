<?php


namespace App\Exceptions;

class EmailNotUniqueException extends BaseException
{
    /** @var array|string[] */
    protected array $errors = ['email' => 'Пользователь с таким Email уже существует'];
}
