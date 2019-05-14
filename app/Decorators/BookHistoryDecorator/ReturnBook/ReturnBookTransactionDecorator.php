<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 3/16/2019
 * Time: 3:39 PM
 */

namespace App\Decorators\BookHistoryDecorator\ReturnBook;


use App\Decorators\EloquentUpdateTransactionDecorator;

class ReturnBookTransactionDecorator extends EloquentUpdateTransactionDecorator
{
    public function __construct(ReturnBookDecorator $service)
    {
        parent::__construct($service);
    }

    public function attachUpdate(bool $updateChecker, array $attributes, int $id): bool
    {
        return $updateChecker;
    }
}