<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 3/11/2019
 * Time: 11:37 PM
 */

namespace App\Http\Controllers\Requests\API\Author;


use App\Http\Controllers\Requests\PatchRequest;
use Illuminate\Support\Facades\Input;

class AuthorPatchRequest extends PatchRequest
{
    public function rules(): array
    {
        if (Input::get('id')) {
            return [
                'name' => 'string',
            ];
        }
        return [
            'id' => 'int|requires|exists:authors,id',
            'name' => 'string'
        ];
    }
}