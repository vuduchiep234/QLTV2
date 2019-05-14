<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 3/12/2019
 * Time: 12:15 AM
 */

namespace App\Http\Controllers\Requests\API\BookImage;


use Illuminate\Support\Facades\Input;

class BookImagePatchRequest
{
    public function rules():array
    {
        if (Input::get('id')) {
            return [
                'image_id' => 'int|exists:images,id',
                'book_id' => 'int|exists:books,id'
            ];
        }
        return [
            'id' => 'int|required|exists:book_images,id',
            'image_id' => 'int|exists:images,id',
            'book_id' => 'int|exists:books,id'
        ];
    }
}