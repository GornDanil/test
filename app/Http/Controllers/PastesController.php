<?php

namespace App\Http\Controllers;

use App\Http\Requests\PastesRequest;
use App\Models\Paste;
use App\Services\Pasted\Abstracts\PastedServiceInterface;
use Illuminate\Support\Facades\Auth;

class PastesController extends Controller
{
    private PastedServiceInterface $service;

    public function __construct(PastedServiceInterface $service)
    {
        $this->service = $service;
    }

    public function submit(PastesRequest $req)
    {
        $this->service->savePast($req);

        return redirect()->route('home')->with('success', 'Сообщение было добавлено');
    }

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

    public function privateData()
    {
        return view('private', ['data' => $this->service->privatePageData()]);
    }

    public function showOneMessage($id)
    {
        $paste = new Paste;
        return view('one-message', ['data' => $paste->find($id)]);
    }
}
