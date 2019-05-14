<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 3/12/2019
 * Time: 12:25 AM
 */

namespace App\Http\Controllers\Requests\API\Image;


use App\Http\Controllers\Requests\PostRequest;

class ImagePostRequest extends PostRequest
{
    public function rules() :array
    {
        return [
            'imageName' => 'string|required|max:50',
            'imageURL' => 'string|required',
        ];
    }
}