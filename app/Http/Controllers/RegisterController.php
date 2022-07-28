<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuthRequest;
use App\Models\User;
use App\Services\Authentication\Abstracts\AuthenticationServiceInterface;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    /** @var AuthenticationServiceInterface */
    private AuthenticationServiceInterface $service;

    /**
     * @param AuthenticationServiceInterface $service
     */
    public function __construct(AuthenticationServiceInterface $service)
    {
        $this->service = $service;
    }

    /**
     * @param AuthRequest $request
     * @return Application|RedirectResponse|Redirector
     */
    public function save(AuthRequest $request)
    {
        if (Auth::check()) {
            return redirect(route('user.private'));
        }
        $request = $request->validated();
        if (User::where('email', $request['email'])->exists()) {
            return redirect(route('user.registration.get'))->withErrors([
                'email' => 'Такой пользователь уже зарегистрирован'
            ]);
        }

        if ($this->service->registration($request)) {

            return redirect(route('user.private'));
        }
        return redirect(route('user.login.view'))->withErrors([
            'formError' => 'Произошла ошибка при сохранении пользователя'
        ]);
    }

    /**
     * @return Application|Factory|View
     */
    public function view()
    {
        return view(route('registration'));
    }
}
