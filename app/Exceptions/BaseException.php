<?php


namespace App\Exceptions;


use Symfony\Component\HttpKernel\Exception\HttpException;

class BaseException extends HttpException
{   /** @var array|string[] */
    protected array $errors;


    protected int $statusCode;

    public function __construct(string $errors = '', \Throwable $previous = null, int $code = 0)
    {
        parent::__construct(
            $this->statusCode ?: 500,
            $errors,
            $previous,
            [],
            $code
        );
    }

    /**
     * @return array|string[]
     */
    public function getErrors(): array
    {
        return $this->errors;
    }
}
