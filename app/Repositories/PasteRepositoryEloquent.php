<?php

namespace App\Repositories;

use App\Models\Paste;
use Illuminate\Database\Query\Builder;
use Illuminate\Support\Facades\Auth;
use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Exceptions\RepositoryException;

/**
 * Class PasteRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class PasteRepositoryEloquent extends BaseRepository implements PasteRepositoryInterface
{
    /**
     * @return string
     */
    public function model(): string
    {
        return Paste::class;
    }

    /**
     * @inheritDoc
     */
    public function modelPast()
    {
        return new Paste();
    }

    /**
     * @inheritDoc
     */
    public function publicData()
    {
        /** Collection<Paste> */
        /** @var Builder $query */
        $query = $this->makeModel();

        return $query;
    }
}
