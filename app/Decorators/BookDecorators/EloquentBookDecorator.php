<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 3/15/2019
 * Time: 9:25 AM
 */

namespace App\Decorators\BookDecorators;


use App\Decorators\EloquentDecorator;
use App\Services\BookService;

class EloquentBookDecorator extends EloquentDecorator implements BookService
{
    public function __construct(BookService $service)
    {
        parent::__construct($service);
    }

    public function searchBook(array $attributes)
    {
       /**
        * @var BookService $service
        */
       $service = $this->getService();
       return $service->searchBook($attributes);
    }
}
