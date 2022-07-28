<?php

namespace App\Repositories;

use App\Entities\Paste;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
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
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Paste::class;
    }

    public function modelPast()
    {
        return new Paste();
    }

    /**
     * @param $filter
     * @return array|LengthAwarePaginator|void
     * @throws RepositoryException
     */
    public function makeFilter($filter)
    {
        /** @var Builder $query */
        $query = $this->makeModel();
        if ($filter == 'allData') {
            return $query = [$query->where('access', '=', 1)->paginate(10),
                $query->where('user', '=', Auth::User()->email)->paginate(10)];
        } elseif ($filter == 'noPrivateData') {
            return $query = $query->where('access', '=', 1
            )->paginate(10);
        } elseif ($filter == 'allHome') {

            return $query = [$query->where('access', '=', 1
            )->orderBy('created_at', 'desc')->paginate(10),
                $query->where('user', '=', Auth::User()->email
                )->orderBy('created_at', 'desc')->paginate(10)];

        } elseif ($filter == "homeNoPrivateData") {

            return $query = $query->where('access', '=', 1
            )->orderBy('created_at', 'desc')->paginate(10);

        } elseif ($filter == "privatePageData") {

            return $query = $query->where('user', '=', Auth::User()->email
            )->orderBy('created_at', 'desc')->paginate(10);

        }


    }
}
