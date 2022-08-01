<?php

namespace App\Domain\DTO;

/**
 * Class PasteDTO
 *
 * @package App\Domain\DTO
 */
class PasteDTO extends DTO
{
    /** @var string  */
    public string $title;

    /** @var int  */
    public int $expiration;

    /** @var int  */
    public int $access;

    /** @var string  */
    public string $message;

    /** @var string  */
    public string $lang;

    /** @var int  */
    public int $user_id;
}
