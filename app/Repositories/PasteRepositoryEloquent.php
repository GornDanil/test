<?php

namespace App\Repositories;

use App\Models\Paste;
use Illuminate\Database\Query\Builder;
use Illuminate\Support\Collection;
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
     * @throws RepositoryException
     */
    public function makeFilter($filter)
    {
        /** Collection<Paste> */
        /** LengthAwarePaginator<Paste> */


        /** @var Builder $query */
        $query = $this->makeModel();
        if ($filter == 'allData') {
            return [$query->where('access', '=', 1)->paginate(10),
                $query->where('user', '=', Auth::user()->id)->paginate(10)];
        } elseif ($filter == 'noPrivateData') {
            return $query->where('access', '=', 1
            )->paginate(10);
        } elseif ($filter == 'allHome') {

            return [$query->where('access', '=', 1
            )->orderBy('created_at', 'desc')->paginate(10),
                $query->where('user', '=', Auth::user()->id
                )->orderBy('created_at', 'desc')->paginate(10)];

        } elseif ($filter == "homeNoPrivateData") {

            return $query->where('access', '=', 1
            )->orderBy('created_at', 'desc')->paginate(10);

        } elseif ($filter == "privatePageData") {

            return $query->where('user', '=', Auth::User()->id
            )->orderBy('created_at', 'desc')->paginate(10);

        }

        return $query->where('access', '=', 1
        )->orderBy('created_at', 'desc')->paginate(10);
    }
}
