<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 3/11/2019
 * Time: 11:11 PM
 */

namespace App\Http\Controllers\Requests\API\User;


use App\Http\Controllers\Requests\PostRequest;

class UserPostRequest extends PostRequest
{
    public function rules(): array
    {
        return [
            'name' => 'string|required|max:50',
            'email' => 'email|required|unique:users,email',
            'password' => 'string|required',
            'c_password' => 'string|same:password'
        ];
    }
}