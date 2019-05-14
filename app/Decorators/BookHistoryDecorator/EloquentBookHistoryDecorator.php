<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 3/16/2019
 * Time: 2:30 PM
 */

namespace App\Decorators\BookHistoryDecorator;


use App\Decorators\EloquentDecorator;
use App\Services\BookHistoryService;

class EloquentBookHistoryDecorator extends EloquentDecorator implements BookHistoryService
{
    public function __construct(BookHistoryService $service)
    {
        parent::__construct($service);
    }

    public function getActiveHistories(array $attributes = [])
    {
        /**
         * @var BookHistoryService $service
         */
        $service = $this->getService();
        return $service->getActiveHistories($attributes);
    }
}