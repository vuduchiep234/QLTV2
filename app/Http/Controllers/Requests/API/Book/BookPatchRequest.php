<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 3/11/2019
 * Time: 11:46 PM
 */

namespace App\Http\Controllers\Requests\API\Book;


use App\Http\Controllers\Requests\PatchRequest;
use Illuminate\Support\Facades\Input;

class BookPatchRequest extends PatchRequest
{
    public function rules(): array
    {
        if (Input::get('id')) {
            return [
                'title' => 'string|max:50|unique:books,title',
                'author_id' => 'array',
                'author_id.*' => 'int|exists:authors,id|distinct',
                'publisher_id' => 'int|exists:publishers,id',
                'genres_id' => 'array',
                'genres_id.*' => 'int|exists:genres,id|distinct',
                'publishedYear' => 'string',
                'image' => 'file|mimes:jpeg,bmp,png',
            ];
        }
        return [
            'id' => 'int|required|exists:books,id',
            'title' => 'string|max:50|unique:books,title',
            'author_id' => 'array',
            'author_id.*' => 'int|exists:authors,id|distinct',
            'publisher_id' => 'int|exists:publishers,id',
            'genres_id' => 'array',
            'genres_id.*' => 'int|exists:genres,id|distinct',
            'publishedYear' => 'string',
            'image' => 'file|mimes:jpeg,bmp,png',
        ];
    }
}