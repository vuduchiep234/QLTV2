<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 4/4/2019
 * Time: 2:51 AM
 */

namespace App\Decorators\AccountDecorators\Login;


use App\Decorators\AccountDecorators\EloquentUserDecorator;
use App\Decorators\Handlers\User\HashPasswordHandler;
use Illuminate\Database\Eloquent\Model;

class LoginDecorator extends EloquentUserDecorator
{
    public function getModel(array $attributes, $id): ?Model
    {

        //comment
        $passwordHandler = new HashPasswordHandler();
        $passwordHandler->handle($attributes);
        $pairs = [
            [
                'needle' => 'email',
                'value' => $attributes['email']
            ],
            [
                'needle' => 'password',
                'value' => $attributes['password']
            ],
        ];
        $userService = $this->getService();
        $user = $userService->getBy($pairs, ['role']);
        return $user;
    }
}