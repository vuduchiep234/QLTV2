<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 4/4/2019
 * Time: 1:21 AM
 */

namespace App\Http\Controllers\Requests\API\Card;


use App\Http\Controllers\Requests\PostRequest;

class CardPostRequest extends PostRequest
{
    public function rules(): array
    {
        return [
            'user_id' => 'int|required|exists:users,id'
        ];
    }
}