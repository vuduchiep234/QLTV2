<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 3/11/2019
 * Time: 10:41 PM
 */

namespace App\Repositories\Eloquent;


use App\Models\Author;
use App\Repositories\AuthorRepository;

class EloquentAuthorRepository extends EloquentRepository implements AuthorRepository
{
    public function __construct(Author $model)
    {
        parent::__construct($model);
    }
}