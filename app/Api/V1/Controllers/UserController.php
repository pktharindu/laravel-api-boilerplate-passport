<?php

namespace App\Api\V1\Controllers;

use App\Models\User;
use Dingo\Api\Http\Request;
use App\Http\Controllers\Controller;
use App\Api\V1\Transformers\UserTransformer;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $limit = $request->get('limit', 2);

        $users = User::paginate($limit)
            ->appends([
                'limit' => $limit,
            ]);

        return fractal($users, new UserTransformer())->respond();
    }
}
