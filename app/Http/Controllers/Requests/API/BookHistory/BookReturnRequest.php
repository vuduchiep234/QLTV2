<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 3/16/2019
 * Time: 3:47 PM
 */

namespace App\Http\Controllers\Requests\API\BookHistory;


use App\Http\Controllers\Requests\PatchRequest;

class BookReturnRequest extends PatchRequest
{
    public function rules(): array
    {
        return [
            'user_id' => 'int|required|exists:users,id',
            'bookCopies' => 'array|required',
            'bookCopies.*' => 'int|required|distinct|exists:book_copies,id',
        ];
    }

}