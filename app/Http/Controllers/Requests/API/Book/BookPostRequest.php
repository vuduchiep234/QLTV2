<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 3/11/2019
 * Time: 11:41 PM
 */

namespace App\Http\Controllers\Requests\API\Book;


use App\Http\Controllers\Requests\PostRequest;

class BookPostRequest extends PostRequest
{
    public function rules():array
    {
        return [
            'title' => 'string|required|max:50|unique:books,title',
            'authors' => 'array|required',
            'authors.*' => 'int|required|exists:authors,id|distinct',
            'publisher_id' => 'int|required|exists:publishers,id',
            'genres' => 'array|required',
            'genres.*' => 'int|required|exists:genres,id|distinct',
            'publishedYear' => 'string|required',
            'image' => 'file|mimes:jpeg,bmp,png'
        ];
    }
}