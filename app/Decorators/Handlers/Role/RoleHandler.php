<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 4/4/2019
 * Time: 2:58 AM
 */

namespace App\Decorators\Handlers\Role;


use App\Decorators\Handlers\EloquentBaseHandler;
use App\Models\Role;
use App\Repositories\Eloquent\EloquentRoleRepository;
use App\Services\Eloquent\EloquentRoleService;
use App\Services\Service;

class RoleHandler extends EloquentBaseHandler
{

    public function createHandlerService(): ?Service
    {
        $role = new Role();
        $repository = new EloquentRoleRepository($role);
        return new EloquentRoleService($repository);
    }
}