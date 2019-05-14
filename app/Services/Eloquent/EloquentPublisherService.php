<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 3/11/2019
 * Time: 10:57 PM
 */

namespace App\Services\Eloquent;


use App\Repositories\PublisherRepository;
use App\Services\PublisherService;

class EloquentPublisherService extends EloquentService implements PublisherService
{
    public function __construct(PublisherRepository $repository)
    {
        parent::__construct($repository);
    }
}