<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 4/4/2019
 * Time: 1:29 AM
 */

namespace App\Decorators\CardDecorator;


use App\Decorators\EloquentUpdateTransactionDecorator;

class RenewedCardTransactionDecorator extends EloquentUpdateTransactionDecorator
{
    public function __construct(RenewedCardDecorator $service)
    {
        parent::__construct($service);
    }

    public function attachUpdate(bool $updateChecker, array $attributes, int $id): bool
    {
        return $updateChecker;
    }
}