<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 3/25/2019
 * Time: 2:49 PM
 */

namespace App\Decorators\Handlers\User;


use App\Decorators\Handlers\HandlerResponseCreators\HandlerResponse;

class CreateUserHandler extends UserHandler
{
    public function handle(array &$attributes): HandlerResponse
    {
        $userService = $this->createHandlerService();

        $password = $attributes['password'];
        $attributes['password'] = hash('md5', $password);

        $userService-> createNewModel($attributes);

        return parent::handle($attributes);
    }
}