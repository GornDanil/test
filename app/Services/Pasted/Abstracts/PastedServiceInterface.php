<?php

namespace App\Services\Pasted\Abstracts;


use App\Domain\DTO\PasteDTO;
use App\Models\User;

interface PastedServiceInterface
{

    /**
     * @param PasteDTO $pasteDTO
     * @return mixed
     */
    public function savePastAuth(PasteDTO $pasteDTO);

    /**
     * @param User $user
     * @return mixed
     */
    public function allPasteData(User $user);

    /**
     * @param User $user
     * @return mixed
     */
    public function homePageData(User $user);

    /**
     * @param User $user
     * @return mixed
     */
    public function privatePageData(User $user);


}
