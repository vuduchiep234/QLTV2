<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 3/12/2019
 * Time: 12:08 AM
 */

namespace App\Http\Controllers\Requests\API\Publisher;


use App\Http\Controllers\Requests\PostRequest;

class PublisherPostRequest extends PostRequest
{
    public function rules():array
    {
        return [
            'publisherName' => 'string|required'
        ];
    }
}