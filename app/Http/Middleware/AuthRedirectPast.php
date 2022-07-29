<?php

namespace App\Http\Middleware;

class AuthRedirectPast extends Authenticate
{
    /**
     * @param $request
     * @param array $guards
     * @return void
     */
    protected function authenticate($request, array $guards)
    {
        if (empty($guards)) {
            $guards = [null];
        }

        foreach ($guards as $guard) {
            if ($this->auth->guard($guard)->check()) {
                return $this->auth->shouldUse($guard);
            }
        }

    }
}
