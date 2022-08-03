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

    /** @var string  */
    public string $access_key;

    /** @var string  */
    public string $message;

    /** @var string  */
    public string $lang;
}
