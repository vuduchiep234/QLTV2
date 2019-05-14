<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 3/12/2019
 * Time: 12:13 AM
 */

namespace App\Http\Controllers\Requests\API\BookImage;


use App\Http\Controllers\Requests\PostRequest;

class BookImagePostRequest extends PostRequest
{
    public function rules(): array
    {
        return [
            'image_id' => 'int|required|exists:images,id',
            'book_id' => 'int|required|exists:books,id'
        ];
    }
}