<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 3/11/2019
 * Time: 10:45 PM
 */

namespace App\Repositories\Eloquent;


use App\Models\BookImage;
use App\Repositories\BookImageRepository;

class EloquentBookImageRepository extends EloquentRepository implements BookImageRepository
{
    public function __construct(BookImage $model)
    {
        parent::__construct($model);
    }
}