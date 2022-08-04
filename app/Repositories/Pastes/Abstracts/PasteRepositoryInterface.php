<?php

namespace App\Repositories\Pastes\Abstracts;

use App\Models\User;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Prettus\Repository\Contracts\RepositoryInterface;
use Prettus\Repository\Exceptions\RepositoryException;

/**
 * Interface PasteRepository.
 *
 * @package namespace App\Repositories;
 */
interface PasteRepositoryInterface extends RepositoryInterface
{

    /**
     * @param User|null $user
     * @return array<string, LengthAwarePaginator>
     * @throws RepositoryException
     */
    public function publicData(?User $user = null): array;

}
