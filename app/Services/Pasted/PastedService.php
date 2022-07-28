<?php


namespace App\Services\Pasted;

use App\Entities\Paste;
use App\Repositories\PasteRepositoryInterface;
use App\Services\Pasted\Abstracts\PastedServiceInterface;
use Illuminate\Support\Facades\Auth;

class PastedService implements PastedServiceInterface
{

    private PasteRepositoryInterface $repository;


    public function __construct(PasteRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    /**
     * save past in bd table pastes
     * @param $FileRequest
     *
     * @return void
     */
    /**
     * @param $FileRequest
     * @return mixed
     */
    public function savePastAuth($FileRequest)
    {

            return $this->repository->create([
                'title' => $FileRequest['title'],
                'message' => $FileRequest['message'],
                'expiration' => $FileRequest['expiration'],
                'access' => $FileRequest['access'],
                'lang' => $FileRequest['lang'],
                'user' => Auth::user()->email,
            ]);




    }

    /**
     * @param $FileRequest
     * @return mixed
     */
    public function savePastNoAuth($FileRequest)
    {

        return $this->repository->create([
            'title' => $FileRequest['title'],
            'message' => $FileRequest['message'],
            'expiration' => $FileRequest['expiration'],
            'access' => $FileRequest['access'],
            'lang' => $FileRequest['lang'],
            'user' => 'undefind',
        ]);



    }
    /**
     * return all unprivate and listing pasts
     * @param $user
     * @return array
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
     * view page paginate private pasts, unprivate past
     * @param $user
     * @return array
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
     * view private pasts
     * @param $user
     * @return mixed
     */
    public function privatePageData($user)
    {
        return $this->repository->makeFilter('privatePageData');



    }
}
