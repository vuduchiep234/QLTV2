<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 4/4/2019
 * Time: 12:47 AM
 */

namespace App\Decorators\ImageDecorator;


use App\Decorators\EloquentDecorator;
use App\Services\ImageService;

class EloquentImageDecorator extends EloquentDecorator
{
    public function __construct(ImageService $service)
    {
        parent::__construct($service);
    }
}