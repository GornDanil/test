<?php

namespace App\Http\Controllers;

use App\Http\Requests\PastesRequest;
use App\Repositories\PasteRepositoryInterface;
use App\Services\Pasted\Abstracts\PastedServiceInterface;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

class PastesController extends Controller
{
    /** @var PastedServiceInterface */
    private PastedServiceInterface $service;
    private PasteRepositoryInterface $repository;

    /**
     * @param PastedServiceInterface $service
     * @param PasteRepositoryInterface $repository
     */
    public function __construct(PastedServiceInterface $service, PasteRepositoryInterface $repository)
    {
        $this->service = $service;
        $this->repository = $repository;
    }

    /**
     * @param PastesRequest $request
     * @return RedirectResponse
     */
    public function submit(PastesRequest $request): RedirectResponse
    {
        $FileRequest = $request->validated();

        $this->service->savePastAuth($FileRequest);


        return redirect()->route('home');
    }

    /**
     * @return Application|Factory|View
     */
    public function allData()
    {
        $user = Auth::user();
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

        $user = Auth::user();
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
     * @return Application|Factory|View
     */
    public function privateData()
    {

        return view('private', ['data' => $this->service->privatePageData()]);

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
