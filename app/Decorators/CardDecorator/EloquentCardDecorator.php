<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 4/4/2019
 * Time: 1:26 AM
 */

namespace App\Decorators\CardDecorator;


use App\Decorators\EloquentDecorator;
use App\Services\CardService;

class EloquentCardDecorator extends EloquentDecorator implements CardService
{
    public function __construct(CardService $service)
    {
        parent::__construct($service);
    }
}