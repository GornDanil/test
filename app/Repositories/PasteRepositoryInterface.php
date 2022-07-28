<?php

namespace App\Repositories;

use App\Models\Paste;
use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * Interface PasteRepository.
 *
 * @package namespace App\Repositories;
 */
interface PasteRepositoryInterface extends RepositoryInterface
{
    public function modelPast();
    public function makeFilter($filter);
}
