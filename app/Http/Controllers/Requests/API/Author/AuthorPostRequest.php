<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 3/11/2019
 * Time: 11:36 PM
 */

namespace App\Http\Controllers\Requests\API\Author;


use App\Http\Controllers\Requests\PostRequest;

class AuthorPostRequest extends PostRequest
{
    public function rules(): array
    {
        return [
            'name' => 'string|required'
        ];
    }
}