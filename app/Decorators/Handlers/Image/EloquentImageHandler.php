<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 4/27/2019
 * Time: 9:28 AM
 */

namespace App\Decorators\Handlers\Image;


use App\Decorators\Handlers\EloquentBaseHandler;
use App\Models\Image;
use App\Repositories\Eloquent\EloquentImageRepository;
use App\Services\Eloquent\EloquentImageService;
use App\Services\Service;

class EloquentImageHandler extends EloquentBaseHandler
{

    public function createHandlerService(): ?Service
    {
        $image = new Image();
        $repository = new EloquentImageRepository($image);
        return new EloquentImageService($repository);
    }
}