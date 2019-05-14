<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 4/10/2019
 * Time: 9:22 PM
 */

namespace App\Decorators\AccountDecorators\CreateAccount;


use App\Decorators\AccountDecorators\EloquentUserDecorator;
use App\Decorators\Handlers\Role\FindRoleHandler;
use App\Decorators\Handlers\User\HashPasswordHandler;
use Illuminate\Database\Eloquent\Model;

class CreateUserProxy extends EloquentUserDecorator
{
    public function createNewModel(array $attributes): ?Model
    {

        $roleHandler= new FindRoleHandler();
        $passwordHandler = new HashPasswordHandler();
        $roleHandler->setNextHandler($passwordHandler);

        $response = $roleHandler->handle($attributes);
        if ($response->getResponseStatus() == false) {
            $this->setMessage($response->getResponseMessage());
            return null;
        }
        //ditme a tuan
        return parent::createNewModel($attributes);
    }
}