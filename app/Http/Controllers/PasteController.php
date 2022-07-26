<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\PasteRequest;
use App\Models\Paste;
class PasteController extends Controller
{
    public function submit(PasteRequest $req) {
        $paste = new Paste();
        $paste->title = $req->input('title');
        $paste->message = $req->input('message');
        $paste->expiration = $req->input('expiration');
        $paste->access = $req->input('access');
        $paste->lang = $req->input('lang');

        $paste->save();

        return redirect()->route('home')->with('success', 'Сообщение было добавлено');

    }
}
