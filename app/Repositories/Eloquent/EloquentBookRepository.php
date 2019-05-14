<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 3/11/2019
 * Time: 10:46 PM
 */

namespace App\Repositories\Eloquent;


use App\Models\Book;
use App\Repositories\BookRepository;


class EloquentBookRepository extends EloquentRepository implements BookRepository
{
    public function __construct(Book $model)
    {
        parent::__construct($model);
    }

    public function getByName(string $name, int $limit)
    {
        $name = '%'.$name.'%';
        $limit = ($limit == null) ? 5 : $limit;
        return $this->newQuery()->where('title', 'like', $name)->limit($limit)->get();
    }
}