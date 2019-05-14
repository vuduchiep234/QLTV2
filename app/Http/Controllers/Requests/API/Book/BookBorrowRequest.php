<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 3/14/2019
 * Time: 12:27 AM
 */

namespace App\Http\Controllers\Requests\API\Book;


use App\Http\Controllers\Requests\PatchRequest;

class BookBorrowRequest extends PatchRequest
{
    public function rules(): array
    {
        return [
            'user_id' => 'int|required|exists:users,id',
            'books' => 'array|required',
            'books.*.book_id' => 'int|required|distinct|exists:books,id',
            'books.*.quantity' => 'int|required|min:0',
        ];
    }
}