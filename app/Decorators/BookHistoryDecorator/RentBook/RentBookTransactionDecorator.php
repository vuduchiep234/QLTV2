<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 3/16/2019
 * Time: 3:39 PM
 */

namespace App\Decorators\BookHistoryDecorator\RentBook;


use App\Decorators\EloquentUpdateTransactionDecorator;

class RentBookTransactionDecorator extends EloquentUpdateTransactionDecorator
{
    public function __construct(RentBookDecorator $service)
    {
        parent::__construct($service);
    }

    public function attachUpdate(bool $updateChecker, array $attributes, int $id): bool
    {
        return $updateChecker;
    }
}