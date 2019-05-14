<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 3/25/2019
 * Time: 12:53 PM
 */

namespace App\Decorators\AuthorDecorators;


use App\Decorators\EloquentDecorator;
use App\Services\AuthorService;

class EloquentAuthorDecorator extends EloquentDecorator implements AuthorService
{
    public function __construct(AuthorService $service)
    {
        parent::__construct($service);
    }
}