<?php

namespace App\Services\Pasted\Abstracts;

use App\Models\User;

interface PastedServiceInterface
{

    /**
     * @param array $FileRequest
     * @param User $user
     * @return mixed
     */
    public function savePastAuth(array $FileRequest);
    public function savePastNoAuth(array $FileRequest);
    /**
     * @param bool $user
     * @return mixed
     */
    public function allPasteData(bool $user);

    /**
     * @param object $user
     * @return mixed
     */
    public function homePageData(bool $user);

    /**
     * @param object $user
     * @return mixed
     */
    public function privatePageData(bool $user);


}
