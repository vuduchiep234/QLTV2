<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 3/11/2019
 * Time: 10:42 PM
 */

namespace App\Repositories\Eloquent;


use App\Models\BookCopy;
use App\Repositories\BookCopyRepository;
use Illuminate\Database\Eloquent\Model;

class EloquentBookCopyRepository extends EloquentRepository implements BookCopyRepository
{
    public function __construct(BookCopy $model)
    {
        parent::__construct($model);
    }

    public function getFirst(array $conditions, array $relations): Model
    {
        return $this->newQuery()->where($conditions)->with($relations)->first();
    }
}