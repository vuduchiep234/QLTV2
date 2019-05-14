<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 3/16/2019
 * Time: 12:03 PM
 */

namespace App\Decorators\Handlers\Book\BookCopy\UpdateBookCopy\UpdateNegativeState;


use App\Decorators\Handlers\Book\BookCopy\UpdateBookCopy\UpdateNegativeStateHandler;

class UpdateBorrowedStateHandler extends UpdateNegativeStateHandler
{

    public function createStateDetail(): string
    {
        return 'borrowed';
    }
}