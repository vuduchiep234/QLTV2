<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 3/11/2019
 * Time: 10:49 PM
 */

namespace App\Repositories\Eloquent;


use App\Models\Publisher;
use App\Repositories\PublisherRepository;

class EloquentPublisherRepository extends EloquentRepository implements PublisherRepository
{
    public function __construct(Publisher $model)
    {
        parent::__construct($model);
    }
}