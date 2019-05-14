<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 4/4/2019
 * Time: 2:53 AM
 */

namespace App\Http\Controllers\Requests\API\User;


use App\Http\Controllers\Requests\PostRequest;

class UserLogoutRequest extends PostRequest
{
    public function rules(): array
    {
        return [
            'user_id' => 'int|required|exists:users,id',
        ];
    }
}