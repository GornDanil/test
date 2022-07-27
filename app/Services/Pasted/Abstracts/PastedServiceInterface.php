<?php

namespace App\Services\Pasted\Abstracts;

interface PastedServiceInterface
{

    public function savePast(array $req);


    public function allPasteData(string $user);

    public function homePageData(string $user);

    public function privatePageData();


}
