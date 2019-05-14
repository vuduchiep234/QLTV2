<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 3/11/2019
 * Time: 10:55 PM
 */

namespace App\Services\Eloquent;


use App\Repositories\BookHistoryRepository;
use App\Services\BookHistoryService;

class EloquentBookHistoryService extends EloquentService implements BookHistoryService
{
    public function __construct(BookHistoryRepository $repository)
    {
        parent::__construct($repository);
    }

    public function getActiveHistories(array $attributes = [])
    {
        /**
         * @var BookHistoryRepository $repository
         */
        $repository = $this->getRepository();
        return $repository->getAllActive($attributes);
    }
}