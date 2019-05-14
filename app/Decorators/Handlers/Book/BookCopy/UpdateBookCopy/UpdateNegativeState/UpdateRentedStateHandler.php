<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 3/16/2019
 * Time: 12:06 PM
 */

namespace App\Decorators\Handlers\Book\BookCopy\UpdateBookCopy\UpdateNegativeState;


use App\Decorators\Handlers\Book\BookCopy\UpdateBookCopy\UpdateNegativeStateHandler;

class UpdateRentedStateHandler extends UpdateNegativeStateHandler
{

    public function createStateDetail(): string
    {
        return 'rented';
    }
}