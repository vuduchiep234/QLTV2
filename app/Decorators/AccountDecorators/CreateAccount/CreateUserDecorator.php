<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 4/4/2019
 * Time: 2:57 AM
 */

namespace App\Decorators\AccountDecorators\CreateAccount;


use App\Decorators\EloquentCreateTransactionDecorator;
use App\Services\Service;
use Illuminate\Database\Eloquent\Model;

class CreateUserDecorator extends EloquentCreateTransactionDecorator
{
    public function __construct(CreateUserProxy $service)
    {
        parent::__construct($service);
    }

    public function attachCreate(Model &$model, $attributes): bool
    {
        //tuan suc vat
        return ($model != null);
    }
}