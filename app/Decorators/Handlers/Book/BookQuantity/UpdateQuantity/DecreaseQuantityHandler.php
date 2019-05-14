<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 3/12/2019
 * Time: 5:44 PM
 */

namespace App\Decorators\Handlers\Book\BookQuantity\UpdateQuantity;


class DecreaseQuantityHandler extends UpdateQuantityHandler
{

    public function calculate(int $current, int $addition): int
    {
        return $current - $addition;
    }
}