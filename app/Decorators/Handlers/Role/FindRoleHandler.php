<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 4/14/2019
 * Time: 9:56 PM
 */

namespace App\Decorators\Handlers\Role;


use App\Decorators\Handlers\HandlerResponseCreators\HandlerResponse;

class FindRoleHandler extends RoleHandler
{
    public function handle(array &$attributes): HandlerResponse
    {
        //tuan
        $roleService = $this->createHandlerService();
        $pairs = [
            [
                'needle' => 'roleType',
                'value' => 'user'
            ],
        ];
        $role = $roleService->getBy($pairs);
        if ($role == null) {
            return $this->createHandlerResponse('Role user not found', false);
        }
        $attributes['role_id'] = $role['id'];
        return parent::handle($attributes);
    }
}