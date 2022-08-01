<?php

namespace App\Domain\DTO;

/**
 * Class RegistrDTO
 *
 * @package App\Domain\DTO
 */
class RegistrDTO extends DTO
{
    /** @var string  */
    public string $name;

    /** @var string  */
    public string $email;

    /** @var string  */
    public string $email_repeat;

    /** @var string  */
    public string $password;
}
