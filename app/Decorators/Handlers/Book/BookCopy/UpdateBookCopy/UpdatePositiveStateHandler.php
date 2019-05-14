<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 3/14/2019
 * Time: 11:40 AM
 */

namespace App\Decorators\Handlers\Book\BookCopy\UpdateBookCopy;


class UpdatePositiveStateHandler extends UpdateBookCopyStateHandler
{

    public function createState(): bool
    {
        return true;
    }

    public function createStateDetail(): string
    {
        return 'available';
    }
}