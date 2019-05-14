<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 3/11/2019
 * Time: 10:56 PM
 */

namespace App\Services\Eloquent;


use App\Repositories\GenreRepository;
use App\Services\GenreService;

class EloquentGenreService extends EloquentService implements GenreService
{
    protected $manyToManyRelations = ['books'];
    public function __construct(GenreRepository $repository)
    {
        parent::__construct($repository);
    }
}