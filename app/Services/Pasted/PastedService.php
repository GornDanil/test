<?php


namespace App\Services\Pasted;

use App\Models\Paste;
use App\Services\Pasted\Abstracts\PastedServiceInterface;
use Illuminate\Support\Facades\Auth;

class PastedService implements PastedServiceInterface
{
    public function savePast($req)
    {
        $paste = new Paste();
        $paste->title = $req->input('title');
        $paste->message = $req->input('message');
        $paste->expiration = $req->input('expiration');
        $paste->access = $req->input('access');
        $paste->lang = $req->input('lang');
        if (Auth::check()) {
            $paste->user = Auth::user()->email;

        } else {
            $paste->user = $req->input('user');
        }

        $paste->save();
    }

    public function allPasteData($user)
    {
        if ($user) {
            $paste = [Paste::where('access', '=', 1)->paginate(10), Paste::where('user', '=', Auth::user()->email)->paginate(10)];

        } else {
            $paste = Paste::where('access', '=', 1)->paginate(10);

        }
        return $paste;
    }

    public function homePageData($user)
    {
        if ($user) {
            $paste = [
                Paste::where('access', '=', 1)->orderBy('created_at', 'desc')->paginate(10),
                Paste::where('user', '=', Auth::user()->email)->paginate(10)
            ];
        } else {
            $paste = Paste::where('access', '=', 1)->orderBy('created_at', 'desc')->paginate(10);
        }
        return $paste;
    }

    public function privatePageData()
    {
        $paste = Paste::where('user', '=', Auth::user()->email)->paginate(10);
        return $paste;
    }
}
