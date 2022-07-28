<?php

namespace App\Http\Controllers;

use App\Http\Requests\PastesRequest;
use App\Models\Paste;
use App\Repositories\PasteRepositoryInterface;
use App\Services\Pasted\Abstracts\PastedServiceInterface;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Auth;

class PastesController extends Controller
{
    /** @var PastedServiceInterface */
    private PastedServiceInterface $service;
    private PasteRepositoryInterface $repository;
    /**
     * @param PastedServiceInterface $service
     */
    public function __construct(PastedServiceInterface $service, PasteRepositoryInterface $repository)
    {
        $this->service = $service;
        $this->repository = $repository;
    }

    /**
     * @param PastesRequest $req
     * @return RedirectResponse
     */
    public function submit(PastesRequest $req)
    {
        $FileRequest = $req->validated();
        $user = auth::user();
        if ($user) {
            $this->service->savePastAuth($FileRequest);
        } else {
            $this->service->savePastNoAuth($FileRequest);
        }


        return redirect()->route('home')->with('success', 'Сообщение было добавлено');
    }

    /**
     * @return Application|Factory|View
     */
    public function allData()
    {
        $user = Auth::check();
        $this->service->allPasteData($user);
        if ($user) {
            return view('messages', [
                'data' => $this->service->allPasteData($user)[0],
                'private' => $this->service->allPasteData($user)[1],

            ]);
        } else {
            return view('messages', [
                'data' => $this->service->allPasteData($user),
            ]);
        }

    }

    /**
     * @return Application|Factory|View
     */
    public function homeData()
    {

        $user = Auth::check();
        if ($user) {
            return view('messages', [
                'data' => $this->service->homePageData($user)[0],
                'private' => $this->service->homePageData($user)[1],

            ]);
        } else {
            return view('messages', [
                'data' => $this->service->homePageData($user),
            ]);
        }
    }

    /**
     * @return Application|Factory|View|RedirectResponse|Redirector
     */
    public function privateData()
    {
        $user = Auth::check();
        if ($user) {
            return view('private', ['data' => $this->service->privatePageData($user)]);
        } else {
            return redirect(route('user.login.view'));
        }
    }

    /**
     * @param $id
     * @return Application|Factory|View
     */
    public function showOneMessage($id)
    {

        $paste = $this->repository->modelPast();
        return view('one-message', ['data' => $paste->find($id)]);
    }
}
