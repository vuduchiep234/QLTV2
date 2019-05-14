<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 3/11/2019
 * Time: 11:22 PM
 */

namespace App\Http\Controllers\Requests\API\Role;


use App\Http\Controllers\Requests\PatchRequest;
use Illuminate\Support\Facades\Input;

class RolePatchRequest extends PatchRequest
{
    public function rules():array
    {
        if (Input::get('id')) {
            return [
                'roleType' => 'string|unique:roles,roleType',
            ];
        }

        return [
            'id' => 'int|required|exists:roles,id',
            'roleType' => 'string|unique:roles,roleType',
        ];
    }
}