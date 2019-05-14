<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 3/11/2019
 * Time: 11:26 PM
 */

namespace App\Http\Controllers\Requests\API\Genre;


use App\Http\Controllers\Requests\PostRequest;

class GenrePostRequest extends PostRequest
{
    public function rules() :array
    {
        return [
            'genreType' => 'string|required|unique:genres,genreType',
        ];
    }
}