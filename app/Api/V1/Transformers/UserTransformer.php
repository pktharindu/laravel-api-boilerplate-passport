<?php

namespace App\Api\V1\Transformers;

use App\Models\User;
use League\Fractal\TransformerAbstract;

class UserTransformer extends TransformerAbstract
{
    /**
     * List of resources possible to include.
     *
     * @var array
     */
    protected $availableIncludes = ['roles', 'permissions'];

    /**
     * List of resources to automatically include.
     *
     * @var array
     */
    protected $defaultIncludes = [];

    public function transform(User $user)
    {
        return [
            'id' => $user->id,
            'name' => $user->name,
            'email' => $user->email,
            'added' => date('Y-m-d', strtotime($user->created_at)),
        ];
    }

    /**
     * Include Roles.
     *
     * @return \League\Fractal\Resource\Collection
     */
    public function includeRoles(User $user)
    {
        return $this->collection($user->roles, new RoleTransformer());
    }

    /**
     * Include Permissions.
     *
     * @return \League\Fractal\Resource\Collection
     */
    public function includePermissions(User $user)
    {
        return $this->collection($user->permissions, new PermissionTransformer());
    }
}
