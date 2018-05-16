<?php

namespace App\Api\V1\Controllers;

use App\Models\User;
use League\Fractal\Manager;
use League\Fractal\Resource\Item;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use League\Fractal\Resource\Collection;
use App\Api\V1\Transformers\UserTransformer;
use League\Fractal\Pagination\IlluminatePaginatorAdapter;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class UserController extends Controller
{
    public function index()
    {
        $fractal = new Manager();

        $fractal->parseIncludes(Input::get('include', ''));

        $limit = Input::get('limit', 10);

        $queryParams = array_diff_key($_GET, array_flip(['page']));
        $usersPaginator = User::paginate($limit)
            ->appends($queryParams)
            ->appends([
                'limit' => $limit,
            ]);

        $users = new Collection($usersPaginator->items(), new UserTransformer());
        $users->setPaginator(new IlluminatePaginatorAdapter($usersPaginator));

        return $fractal->createData($users)->toArray();
    }

    public function show($id)
    {
        $fractal = new Manager();

        $fractal->parseIncludes(Input::get('include', ''));

        if (! $user = User::find($id)) {
            throw new NotFoundHttpException();
        }

        $user = new Item($user, new UserTransformer());

        return $fractal->createData($user)->toArray();
    }
}
