<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 3/11/2019
 * Time: 11:01 PM
 */

namespace App\Services\Eloquent;


use App\Repositories\BookImageRepository;
use App\Services\BookImageService;

class EloquentBookImageService extends EloquentService implements BookImageService
{
    public function __construct(BookImageRepository $repository)
    {
        parent::__construct($repository);
    }
}