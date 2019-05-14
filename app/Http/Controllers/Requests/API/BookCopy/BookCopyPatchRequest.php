<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 3/11/2019
 * Time: 11:54 PM
 */

namespace App\Http\Controllers\Requests\API\BookCopy;


use App\Http\Controllers\Requests\PatchRequest;
use Illuminate\Support\Facades\Input;

class BookCopyPatchRequest extends PatchRequest
{
    public function rules()
    {
        if (Input::get('id')) {
            return [
                'book_id' => 'int|exists:books,id'
            ];
        }

        return [
            'id' => 'int|requires|exists:book_copies,id',
            'book_id' => 'int|exists:books,id'
        ];
    }
}