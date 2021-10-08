<?php

namespace App\Providers;

use Dingo\Api\Auth\Provider\Authorization;
use Dingo\Api\Routing\Route;
use Illuminate\Http\Request;

class PassportDingoProvider extends Authorization
{
    /**
     * Get the providers authorization method.
     *
     * @return string
     */
    public function getAuthorizationMethod()
    {
        return 'bearer';
    }

    /**
     * Authenticate the request and return the authenticated user instance.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Dingo\Api\Routing\Route  $route
     * @return mixed
     */
    public function authenticate(Request $request, Route $route)
    {
        return $request->user();
    }
}
