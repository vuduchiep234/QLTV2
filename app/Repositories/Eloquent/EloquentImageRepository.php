<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 3/11/2019
 * Time: 10:48 PM
 */

namespace App\Repositories\Eloquent;


use App\Models\Image;
use App\Repositories\ImageRepository;

class EloquentImageRepository extends EloquentRepository implements ImageRepository
{
    public function __construct(Image $model)
    {
        parent::__construct($model);
    }
}