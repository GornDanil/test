<?php

namespace App\Services\Pasted\Abstracts;


use App\Domain\DTO\PasteDTO;
use App\Models\Paste;
use App\Models\User;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Prettus\Repository\Exceptions\RepositoryException;

interface PastedServiceInterface
{
    /**
     * @param PasteDTO $pasteDTO
     * @param User $user
     * @return Paste
     */
    public function savePastAuth(PasteDTO $pasteDTO, User $user): Paste;

    /**
     * @param User|null $user
     * @return array<LengthAwarePaginator>
     * @throws RepositoryException
     */
    public function allPasteData(?User $user = null): array;

    /**
     * @param int $id
     * @return Paste|null
     */
    public function showOneMessage(int $id): ?Paste;
}
