<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 4/26/2019
 * Time: 4:22 PM
 */

namespace App\Http\Controllers\Requests\API\User;


use App\Http\Controllers\Requests\PatchRequest;

class UserChangePasswordRequest extends PatchRequest
{
    public function rules(): array
    {
        return [
            'id' => 'int|required|exists:users,id',
            'old_password' => 'string|required',
            'new_password' => 'string|required|min:6',
            'c_new_password' => 'string|required|same:new_password',
        ];
    }
}