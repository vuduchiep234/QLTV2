<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 3/25/2019
 * Time: 8:20 PM
 */

namespace App\Decorators\AccountDecorators;


use App\Decorators\EloquentDecorator;
use App\Services\UserService;

class EloquentUserDecorator extends EloquentDecorator implements UserService
{
    public function __construct(UserService $service)
    {
        parent::__construct($service);
    }
}