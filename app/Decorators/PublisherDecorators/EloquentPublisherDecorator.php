<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 3/25/2019
 * Time: 2:22 PM
 */

namespace App\Decorators\PublisherDecorators;


use App\Decorators\EloquentDecorator;
use App\Services\PublisherService;

class EloquentPublisherDecorator extends EloquentDecorator implements PublisherService
{
    public function __construct(PublisherService $service)
    {
        parent::__construct($service);
    }
}