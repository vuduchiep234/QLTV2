<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 3/12/2019
 * Time: 4:59 PM
 */

namespace App\Repositories\Eloquent;


use App\BookQuantity;
use App\Repositories\BookQuantityRepository;

class EloquentBookQuantityRepository extends EloquentRepository implements BookQuantityRepository
{
    public function __construct(BookQuantity $model)
    {
        parent::__construct($model);
    }
}