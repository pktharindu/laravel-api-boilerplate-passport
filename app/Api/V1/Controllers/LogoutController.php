<?php

namespace App\Api\V1\Controllers;

use App\Http\Controllers\Controller;
use Auth;
use Symfony\Component\HttpKernel\Exception\HttpException;

class LogoutController extends Controller
{
    /**
     * Log the user out (Invalidate the token).
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout()
    {
        if (! Auth::user()->token()->revoke()) {
            throw new HttpException(500);
        }

        return response()
            ->json(['message' => 'Successfully logged out']);
    }
}
