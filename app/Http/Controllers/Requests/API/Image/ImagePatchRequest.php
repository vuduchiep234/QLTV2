<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 3/12/2019
 * Time: 12:26 AM
 */

namespace App\Http\Controllers\Requests\API\Image;


use App\Http\Controllers\Requests\PatchRequest;
use Illuminate\Support\Facades\Input;

class ImagePatchRequest extends PatchRequest
{
    public function rules() :array
    {
        if (Input::get('id')) {
            return [
                'imageName' => 'string|max:50',
                'imageURL' => 'string',
            ];
        }
        return [
            'id' => 'int|required|exists:images,id',
            'imageName' => 'string|max:50',
            'imageURL' => 'string',
        ];
    }
}