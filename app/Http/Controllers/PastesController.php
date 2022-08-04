<?php

namespace App\Http\Controllers;

use App\Domain\DTO\PasteDTO;
use App\Http\Requests\PastesRequest;
use App\Models\User;
use App\Services\Pasted\Abstracts\PastedServiceInterface;
use Atwinta\DTO\Exceptions\DtoException;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Prettus\Repository\Exceptions\RepositoryException;

class PastesController extends Controller
{
    /** @var PastedServiceInterface */
    private PastedServiceInterface $service;

    /** @param PastedServiceInterface $service */
    public function __construct(PastedServiceInterface $service)
    {
        $this->service = $service;
    }

    /**
     * @param PastesRequest $request
     * @return RedirectResponse
     * @throws DtoException
     */
    public function submit(PastesRequest $request): RedirectResponse
    {
        /** @var User $user */
        $user = Auth::user();

        $pasteDTO = new PasteDTO($request->validated());

        $this->service->savePastAuth($pasteDTO, $user);

        return redirect()->route('home');
    }

    /**
     * @return Application|Factory|View
     * @throws RepositoryException
     */
    public function allData()
    {
        /** @var User $user */
        $user = Auth::user();

        return view('messages',
            $this->service->allPasteData($user)
        );

    }

    /** @return Application|Factory|View
     * @throws RepositoryException
     */
    public function privateData()
    {
        /** @var User $user */
        $user = Auth::user();
        $data = $this->service->allPasteData($user);
        return view('private', ['data' => $data['private'] ?? []]);
    }

    /**
     * @param int $id
     * @return Application|Factory|View
     */
    public function showOneMessage(int $id)
    {
        $paste = $this->service->showOneMessage($id);
        return view('one-message', ['data' => $paste]);
    }
}
