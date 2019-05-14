<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 3/25/2019
 * Time: 10:41 AM
 */

namespace App\Decorators\GenreDecorators;


use App\Decorators\EloquentDecorator;
use App\Services\GenreService;

class EloquentGenreDecorator extends EloquentDecorator implements GenreService
{
    public function __construct(GenreService $service)
    {
        parent::__construct($service);
    }
}