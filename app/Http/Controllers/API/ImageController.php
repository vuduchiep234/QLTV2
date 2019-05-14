<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 3/12/2019
 * Time: 4:19 PM
 */

namespace App\Http\Controllers\API;


use App\Http\Controllers\Requests\API\Image\ImageDeleteRequest;
use App\Http\Controllers\Requests\API\Image\ImageGetRequest;
use App\Http\Controllers\Requests\API\Image\ImagePatchRequest;
use App\Http\Controllers\Requests\API\Image\ImagePostRequest;
use App\Services\ImageService;

class ImageController extends APIController
{
    public function __construct(ImageService $service)
    {
        parent::__construct($service);
    }

    public function get(ImageGetRequest $request, int $id = null)
    {
        return parent::_get($request, $id);
    }

    public function patch(ImagePatchRequest $request, int $id = null)
    {
        return parent::_patch($request, $id);
    }

    public function post(ImagePostRequest $request)
    {
        return parent::_post($request);
    }

    public function delete(ImageDeleteRequest $request, int $id = null)
    {
        return parent::_delete($request, $id);
    }
}