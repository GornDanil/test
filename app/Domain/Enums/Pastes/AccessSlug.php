<?php


namespace App\Domain\Enums\Pastes;



use App\Domain\Enums\Traits\Constantable;

class AccessSlug
{
    use Constantable;

    const PUBLIC = "public";
    const UNLISTED = "unlisted";
    const PRIVATE = "private";
}
