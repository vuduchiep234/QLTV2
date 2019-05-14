<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 3/12/2019
 * Time: 5:00 PM
 */

namespace App\Services\Eloquent;


use App\Repositories\BookQuantityRepository;
use App\Services\BookQuantityService;

class EloquentBookQuantityService extends EloquentService implements BookQuantityService
{
    public function __construct(BookQuantityRepository $repository)
    {
        parent::__construct($repository);
    }
}