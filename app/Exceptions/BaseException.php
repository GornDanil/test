<?php


namespace App\Exceptions;


use Symfony\Component\HttpKernel\Exception\HttpException;

class BaseException extends HttpException
{
    protected array $errors;
    protected $statusCode;

    public function __construct(string $message = '', \Throwable $previous = null, int $code = 0)
    {
        parent::__construct(
            $this->statusCode ?: 500,
            '',
            null,
            [],
            0
        );
    }
    public function getErrors()
    {
        return $this->errors;
    }
}
