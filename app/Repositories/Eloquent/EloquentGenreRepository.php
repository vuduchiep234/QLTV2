<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 3/11/2019
 * Time: 10:47 PM
 */

namespace App\Repositories\Eloquent;


use App\Models\Genre;
use App\Repositories\GenreRepository;

class EloquentGenreRepository extends EloquentRepository implements GenreRepository
{
    public function __construct(Genre $model)
    {
        parent::__construct($model);
    }
}