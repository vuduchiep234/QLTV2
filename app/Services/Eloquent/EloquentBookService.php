<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 3/11/2019
 * Time: 10:17 PM
 */

namespace App\Services\Eloquent;


use App\Repositories\BookRepository;
use App\Services\BookService;

class EloquentBookService extends EloquentService implements BookService
{
    protected $manyToManyRelations = ['authors', 'genres', 'images'];

    public function __construct(BookRepository $repository)
    {
        parent::__construct($repository);
    }

    public function searchBook(array $attributes)
    {
        /**
         * @var BookRepository $repository
         */
        $repository = $this->getRepository();
        return $repository->getByName($attributes['q'], $attributes['limit']);
    }
}