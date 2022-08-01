<?php


namespace App\Services\Pasted;

use App\Domain\DTO\PasteDTO;
use App\Models\User;
use App\Repositories\PasteRepositoryInterface;
use App\Services\Pasted\Abstracts\PastedServiceInterface;
use Illuminate\Support\Facades\Auth;

class PastedService implements PastedServiceInterface
{
    /**
     * @var PasteRepositoryInterface
     */
    private PasteRepositoryInterface $repository;

    /**
     * @param PasteRepositoryInterface $repository
     */
    public function __construct(PasteRepositoryInterface $repository)
    {
        $this->repository = $repository;

    }

    /**
     * @inheritDoc
     */
    public function savePastAuth(PasteDTO $pasteDTO)
    {

        if (Auth::user()) {
            $user = Auth::user()->id;
        } else {
            $user = null;
        }

        return $this->repository->create([
            'title' => $pasteDTO->title,
            'message' => $pasteDTO->message,
            'expiration' => $pasteDTO->expiration,
            'access' => $pasteDTO->access,
            'lang' => $pasteDTO->lang,
            'user_id' => $user
        ]);

    }


    /**
     * @inheritDoc
     */
    public function allPasteData($user)
    {
        if ($user) {
            return [
                $this->repository->publicData()->where('access', 1)->paginate(10),
                $this->userRepository->UserPasts()->paginate(10)
            ];

        } else {
            return $this->repository->publicData()->where('access', 1)->paginate(10);

        }
    }

    /**
     * @inheritDoc
     */
    public function homePageData($user)
    {
        if ($user) {
            return [
                $this->repository->publicData()->where('access', 1)->paginate(10),
                $this->userRepository->UserPasts()->paginate(10)
            ];
        } else {
            return $this->repository->publicData()->where('access', 1)->paginate(10);
        }

    }

    /**
     * @inheritDoc
     */
    public function privatePageData($user)
    {
        dd(User::query()->pastes->find($user->id));

    }
}
