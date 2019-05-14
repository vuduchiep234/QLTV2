<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 4/26/2019
 * Time: 4:21 PM
 */

namespace App\Decorators\AccountDecorators\ChangePassword;


use App\Decorators\AccountDecorators\EloquentUserDecorator;
use App\Decorators\Handlers\User\HashPasswordHandler;

class ChangePasswordDecorator extends EloquentUserDecorator
{
    public function updateModel(array $attributes, $id): bool
    {
        $attributes['password'] = $attributes['old_password'];
        $this->hashPassword($attributes);
        $pairs = [
            [
                'needle' => 'id',
                'value' => $id
            ],
            [
                'needle' => 'password',
                'value' => $attributes['password']
            ],
        ];
        $userService = $this->getService();
        $user = $userService->getBy($pairs);

        if ($user != null) {
            $attributes['password'] = $attributes['new_password'];
            $this->hashPassword($attributes);
            unset($attributes['c_new_password']);
            unset($attributes['old_password']);
            return parent::updateModel($attributes, $id);
        } else {
            return false;
        }
    }

    private function hashPassword(array &$attributes)
    {
        $passwordHandler = new HashPasswordHandler();
        $passwordHandler->handle($attributes);
    }
}