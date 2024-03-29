<?php

namespace App\Api\V1\Controllers;

use App\Api\V1\Requests\RegisterRequest;
use App\Http\Controllers\Controller;
use App\Models\User;
use Symfony\Component\HttpKernel\Exception\HttpException;

class RegisterController extends Controller
{
    public function register(RegisterRequest $request)
    {
        $user = new User($request->all());
        if (! $user->save()) {
            throw new HttpException(500);
        }

        return response()->json([
            'status' => 'ok',
        ], 201);
    }
}
