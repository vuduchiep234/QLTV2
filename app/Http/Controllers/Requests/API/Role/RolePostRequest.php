<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 3/11/2019
 * Time: 11:21 PM
 */

namespace App\Http\Controllers\Requests\API\Role;


use App\Http\Controllers\Requests\PostRequest;

class RolePostRequest extends PostRequest
{
    public function rules():array
    {
        return [
            'roleType' => 'string|required|unique:roles,roleType',
        ];
    }
}