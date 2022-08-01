<?php

namespace App\Services\Pasted\Abstracts;


use App\Domain\DTO\PasteDTO;

interface PastedServiceInterface
{

    /**
     * @param PasteDTO $pasteDTO
     * @return mixed
     */
    public function savePastAuth(PasteDTO $pasteDTO);

    /**
     * @param object $user
     * @return mixed
     */
    public function allPasteData(object $user);

    /**
     * @param object $user
     * @return mixed
     */
    public function homePageData(object $user);

    /**
     * @return mixed
     */
    public function privatePageData();


}
