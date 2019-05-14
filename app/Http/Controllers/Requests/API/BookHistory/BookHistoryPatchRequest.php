<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 3/12/2019
 * Time: 12:02 AM
 */

namespace App\Http\Controllers\Requests\API\BookHistory;


use App\Http\Controllers\Requests\PatchRequest;
use Illuminate\Support\Facades\Input;

class BookHistoryPatchRequest extends PatchRequest
{
    public function rules(): array
    {
        if (Input::get('id')) {
            return [
                'bookCopy_id' => 'int|exists:book_copies,id',
                'user_id' => 'int|exists:users,id',
            ];
        }
        return [
            'id' => 'int|required|exists:book_histories,id',
            'bookCopy_id' => 'int|exists:book_copies,id',
            'user_id' => 'int|exists:users,id',
        ];
    }
}