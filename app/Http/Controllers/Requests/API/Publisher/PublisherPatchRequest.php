<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 3/12/2019
 * Time: 12:09 AM
 */

namespace App\Http\Controllers\Requests\API\Publisher;


use App\Http\Controllers\Requests\PatchRequest;
use Illuminate\Support\Facades\Input;

class PublisherPatchRequest extends PatchRequest
{
    public function rules() :array
    {
        if (Input::get('id')) {
            return [
                'publisherName' => 'string',
            ];
        }
        return [
            'id' => 'int|required|exists:publishers,id',
            'publisherName' => 'string'
        ];
    }
}