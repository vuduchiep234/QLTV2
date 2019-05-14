<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 3/11/2019
 * Time: 11:59 PM
 */

namespace App\Http\Controllers\Requests\API\BookHistory;


use App\Http\Controllers\Requests\PostRequest;

class BookHistoryPostRequest extends PostRequest
{
    public function rules():array
    {
        return [
            'bookCopy_id' => 'int|required|exists:book_copies,id',
            'user_id' => 'int|required|exists:users,id',
        ];
    }
}