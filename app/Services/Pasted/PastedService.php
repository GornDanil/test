<?php


namespace App\Services\Pasted;

use App\Domain\DTO\PasteDTO;
use App\Repositories\Pastes\PasteRepositoryInterface;
use App\Services\Pasted\Abstracts\PastedServiceInterface;

class PastedService implements PastedServiceInterface
{
    /** @var PasteRepositoryInterface */
    private PasteRepositoryInterface $repository;

    /** @param PasteRepositoryInterface $repository */
    public function __construct(PasteRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    /** @inheritDoc */
    public function savePastAuth(PasteDTO $pasteDTO, $user)
    {
        return $this->repository->create([
            'title' => $pasteDTO->title,
            'message' => $pasteDTO->message,
            'expiration' => $pasteDTO->expiration,
            'access_key' => $pasteDTO->access_key,
            'lang' => $pasteDTO->lang,
            'user_id' => $user->id
        ]);
    }

    /** @inheritDoc */
    public function allPasteData($user)
    {
        return $this->repository->publicData($user);
    }

    /** @inheritDoc */
    public function showOneMessage(int $id)
    {
        return $this->repository->find($id);
    }
}
