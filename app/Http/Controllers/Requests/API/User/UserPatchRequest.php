<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 3/11/2019
 * Time: 11:14 PM
 */

namespace App\Http\Controllers\Requests\API\User;


use App\Http\Controllers\Requests\PatchRequest;
use Illuminate\Support\Facades\Input;

class UserPatchRequest extends PatchRequest
{
    public function rules():array
    {
        if (Input::get('id')) {
            return [
                'name' => 'string',
                'email' => 'email'
            ];
        }
        return [
            'id' => 'int|required|exists:users,id',
            'name'=> 'string',
            'email' => 'email'
        ];
    }
}