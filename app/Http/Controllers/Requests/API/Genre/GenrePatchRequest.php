<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 3/11/2019
 * Time: 11:29 PM
 */

namespace App\Http\Controllers\Requests\API\Genre;


use App\Http\Controllers\Requests\PatchRequest;
use Illuminate\Support\Facades\Input;

class GenrePatchRequest extends PatchRequest
{
    public function rules():array
    {
        if (Input::get('id')) {
            return [
                'genreType' => 'string|unique:genres,genreType',
            ];
        }
        return [
            'id' => 'int|required|exists:genres,id',
            'genreType' => 'string|unique:genres,genreType'
        ];
    }
}