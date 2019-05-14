<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 4/2/2019
 * Time: 11:26 PM
 */

namespace App\Decorators\BookDecorators\BorrowBook;


use App\Decorators\EloquentCreateTransactionDecorator;
use Illuminate\Database\Eloquent\Model;

class BorrowBookTransactionDecorator extends EloquentCreateTransactionDecorator
{
    public function __construct(BorrowBookProxy $service)
    {
        parent::__construct($service);
    }

    public function attachCreate(Model &$model, $attributes): bool
    {
        return ($model != null);
    }
}