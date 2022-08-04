<?php

namespace App\Services\Pasted\Abstracts;


use App\Domain\DTO\PasteDTO;
use App\Models\Paste;
use App\Models\User;
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
     * @param User $user
     * @return array
     * @throws RepositoryException
     */
    public function allPasteData(User $user): array;

    /**
     * @param int $id
     * @return Paste
     */
    public function showOneMessage(int $id): Paste;
}
