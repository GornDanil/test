<?php

namespace App\Repositories;

use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * Interface PasteRepository.
 *
 * @package namespace App\Repositories;
 */
interface PasteRepositoryInterface extends RepositoryInterface
{
    /**
     * @return mixed
     */
    public function model();
    /**
     * @return mixed
     */
    public function modelPast();

    /**
     * @param $filter
     * @return mixed
     */
    public function makeFilter($filter);
}
