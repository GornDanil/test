<?php


namespace App\Services\Pasted;

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
    public function savePastAuth($FileRequest)
    {

            return $this->repository->create([
                'title' => $FileRequest['title'],
                'message' => $FileRequest['message'],
                'expiration' => $FileRequest['expiration'],
                'access' => $FileRequest['access'],
                'lang' => $FileRequest['lang'],
                'user' => $FileRequest['user_id'],
            ]);

    }


    /**
     * @inheritDoc
     */
    public function allPasteData($user)
    {
        if ($user) {
            return $this->repository->makeFilter('allData');

        } else {
            return $this->repository->makeFilter('noPrivateData');

        }
    }

    /**
     * @inheritDoc
     */
    public function homePageData($user)
    {
        if ($user) {
                return $this->repository->makeFilter('allHome');
        } else {
            return $this->repository->makeFilter('homeNoPrivateData');
        }

    }

    /**
     * @inheritDoc
     */
    public function privatePageData()
    {
        return $this->repository->makeFilter('privatePageData');
    }
}
