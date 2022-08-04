<?php

namespace App\Repositories\Pastes;

use App\Domain\Enums\Pastes\AccessSlug;
use App\Models\Paste;
use App\Models\User;
use Illuminate\Database\Query\Builder;
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
    public function publicData(?User $user = null): array
    {
        /** Collection<Paste> */
        /** @var Builder $query */
        $query = $this->makeModel();

        $data['data'] = $query->where('access_key', AccessSlug::PUBLIC)->paginate(10);

        if ($user !== null) {
            $data[AccessSlug::PRIVATE] = $query->where('user_id', $user->id)->paginate(10);
        }

        return $data;
    }
}
