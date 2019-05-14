<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 3/11/2019
 * Time: 10:43 PM
 */

namespace App\Repositories\Eloquent;


use App\Models\BookHistory;
use App\Repositories\BookHistoryRepository;

class EloquentBookHistoryRepository extends EloquentRepository implements BookHistoryRepository
{
    public function __construct(BookHistory $model)
    {
        parent::__construct($model);
    }

    public function getAllActive(array $attributes = [])
    {
        return $this->getAll($attributes)->where('state', '=', 1)
            ->where('user_id', '=', $attributes['userId']);
    }
}