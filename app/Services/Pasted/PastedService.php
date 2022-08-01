<?php


namespace App\Services\Pasted;
use App\Domain\DTO\PasteDTO;
use Illuminate\Support\Facades\Auth;
use App\Repositories\PasteRepositoryInterface;
use App\Services\Pasted\Abstracts\PastedServiceInterface;

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

            return $this->repository->create([
                'title' => $pasteDTO->title,
                'message' => $pasteDTO->message,
                'expiration' => $pasteDTO->expiration,
                'access' => $pasteDTO->access,
                'lang' => $pasteDTO->lang,
                'user' => $pasteDTO->user_id,
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
                $this->repository->publicData()->where('user', Auth::user()->id)->paginate(10)
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
                $this->repository->publicData()->where('user', Auth::user()->id)->paginate(10)
            ];
        } else {
            return $this->repository->publicData()->where('access', 1)->paginate(10);
        }

    }

    /**
     * @inheritDoc
     */
    public function privatePageData()
    {
        return $this->repository->publicData()->where('user', Auth::user()->id)->paginate(10);
    }
}
