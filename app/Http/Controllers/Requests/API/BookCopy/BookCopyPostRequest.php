<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 3/11/2019
 * Time: 11:52 PM
 */

namespace App\Http\Controllers\Requests\API\BookCopy;


use App\Http\Controllers\Requests\PostRequest;

class BookCopyPostRequest extends PostRequest
{
    public function rules(): array
    {
        return [
            'book_id' => 'int|required|exists:books,id'
        ];
    }
}