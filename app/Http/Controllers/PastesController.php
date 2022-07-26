<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\PastesRequest;
use App\Models\Paste;
use Auth;
use Carbon\Carbon;
class PastesController extends Controller
{
   public function submit(PastesRequest $req) {
    $paste = new Paste();
    $paste->title = $req->input('title');
    $paste->message = $req->input('message');
    $paste->expiration = $req->input('expiration');
    $paste->access = $req->input('access');
    $paste->lang = $req->input('lang');
    if(Auth::check()) {
      $paste->user = Auth::user()->email;
   
  } else {
      $paste->user = $req->input('user');
  }

    $paste->save();

    return redirect()->route('home')->with('success', 'Сообщение было добавлено');
   }
   public function allData() {
      //Paste::where('created_at', '<=', Carbon::now()->subMinutes(10)->toDateTimeString())->delete();
      $paste = Paste::where('access', '=', 1)->paginate(10);
      if(Auth::check()) {
         $private = Paste::where('user', '=', Auth::user()->email)->paginate(10);
         return view('messages', [
            'data' => $paste,
            'private' => $private
         ]);
      } else {
         return view('messages', ['data' => $paste]);
      }
      
      
      
  }
  public function homeData() {
   $paste = Paste::where('access', '=', 1)->orderBy('created_at','desc')->paginate(10);
   if(Auth::check()) {
      $private = Paste::where('user', '=', Auth::user()->email)->paginate(10);
      return view('messages', [
         'data' => $paste,
         'private' => $private
      ]);
   } else {
      return view('messages', ['data' => $paste]);
   }
}
  public function privateData() {

   $paste = Paste::where('user', '=', Auth::user()->email)->paginate(10);
   return view('private', ['data' => $paste]);

}
   public function showOneMessage($id) {
      $paste = new Paste;
      return view('one-message', ['data' => $paste->find($id)]);
   }  
}
