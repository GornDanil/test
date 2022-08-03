<?php

namespace App\Services\Pasted\Abstracts;


use App\Domain\DTO\PasteDTO;
use App\Models\User;
use Prettus\Repository\Exceptions\RepositoryException;

interface PastedServiceInterface
{
    /**
     * @param PasteDTO $pasteDTO
     * @param mixed $user
     * @return mixed
     */
    public function savePastAuth(PasteDTO $pasteDTO, $user);

    /**
     * @param User $user
     * @return mixed
     * @throws RepositoryException
     */
    public function allPasteData(User $user);

    /**
     * @param User $user
     * @return mixed
     */

    /**
     * @param int $id
     * @return mixed
     */
    public function showOneMessage(int $id);
}
