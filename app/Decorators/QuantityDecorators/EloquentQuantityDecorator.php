<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 4/2/2019
 * Time: 7:48 PM
 */

namespace App\Decorators\QuantityDecorators;


use App\Decorators\EloquentDecorator;
use App\Services\BookQuantityService;

class EloquentQuantityDecorator extends EloquentDecorator implements BookQuantityService
{
    public function __construct(BookQuantityService $service)
    {
        parent::__construct($service);
    }
}