<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuthRequest;
use App\Models\User;
use App\Repositories\UserRepositoryInterface;
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
    private UserRepositoryInterface $repository;
    /**
     * @param AuthenticationServiceInterface $service
     */
    public function __construct(AuthenticationServiceInterface $service, UserRepositoryInterface $repository)
    {
        $this->service = $service;
        $this->repository = $repository;
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
        if ($this->repository->registr($request)) {
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
