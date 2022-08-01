<?php

namespace App\Domain\DTO;

use Carbon\Carbon;

/**
 * Class Search
 *
 * @package App\Domain\DTO
 */
class LoginDTO extends DTO
{
    /** @var string */
    public string $email;

    /** @var string */
    public string $password;

    /** @var Carbon  */
    public Carbon $created_at;

    /**
     * @param string $value
     * @return Carbon
     */
//    public function setCreatedAtAttribute(string $value): Carbon
//    {
//        return Carbon::parse($value);
//    }
}
