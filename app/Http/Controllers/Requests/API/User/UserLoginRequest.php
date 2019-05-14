<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 4/4/2019
 * Time: 2:53 AM
 */

namespace App\Http\Controllers\Requests\API\User;


use App\Http\Controllers\Requests\PostRequest;

class UserLoginRequest extends PostRequest
{
    public function rules(): array
    {
        return [
            'email' => 'email|required',
            'password' => 'string|required',
        ];
    }
}