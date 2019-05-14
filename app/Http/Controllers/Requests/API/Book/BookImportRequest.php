<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 3/12/2019
 * Time: 4:41 PM
 */

namespace App\Http\Controllers\Requests\API\Book;


use App\Http\Controllers\Requests\PatchRequest;
use Illuminate\Support\Facades\Input;

class BookImportRequest extends PatchRequest
{
    public function rules(): array
    {
        if (Input::get('id')) {
            return [
                'quantity' => 'int|required|min:0',
            ];
        }
        return [
            'id' => 'int|required|exists:books,id',
            'quantity' => 'int|required|min:0',
        ];
    }
}