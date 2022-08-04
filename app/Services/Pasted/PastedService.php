<?php


namespace App\Services\Pasted;

use App\Domain\DTO\PasteDTO;
use App\Exceptions\AuthontificationException;
use App\Models\Paste;
use App\Models\User;
use App\Repositories\Pastes\Abstracts\PasteRepositoryInterface;
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
    public function savePastAuth(PasteDTO $pasteDTO, User $user): Paste
    {
        $validateDTO = array_merge($pasteDTO->toArray(), ['user_id' => $user->id ?? null]);
        return $this->repository->create($validateDTO);
    }

    /** @inheritDoc */
    public function allPasteData($user = null): array
    {
        return $this->repository->publicData($user);
    }

    /** @inheritDoc */
    public function showOneMessage(int $id): ?Paste
    {
        return $this->repository->findWhere(['id' => $id])->first();
    }
}
