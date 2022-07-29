<?php

namespace App\Services\Pasted\Abstracts;


interface PastedServiceInterface
{

    /**
     * @param array $FileRequest
     * @return mixed
     */
    public function savePastAuth(array $FileRequest);

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
