<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 3/25/2019
 * Time: 2:49 PM
 */

namespace App\Decorators\Handlers\User;


use App\Decorators\Handlers\EloquentBaseHandler;
use App\Models\User;
use App\Repositories\Eloquent\EloquentUserRepository;
use App\Services\Eloquent\EloquentUserService;
use App\Services\Service;

class UserHandler extends EloquentBaseHandler
{

    public function createHandlerService(): ?Service
    {
        $user = new User();
        $repository = new EloquentUserRepository($user);
        return new EloquentUserService($repository);
    }
}