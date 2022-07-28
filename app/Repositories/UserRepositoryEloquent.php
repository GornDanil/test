<?php

namespace App\Repositories;

use App\Entities\User;
use Illuminate\Database\Query\Builder;
use Prettus\Repository\Eloquent\BaseRepository;

/**
 * Class UserRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class UserRepositoryEloquent extends BaseRepository implements UserRepositoryInterface
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return User::class;
    }


    public function registr($request)
    {
        /** @var Builder $query */
        $query = $this->makeModel();
        return $query = $query->where('email', $request['email'])->exists();
    }


    /**
     * Boot up the repository, pushing criteria
     */


}
