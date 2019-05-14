<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 3/11/2019
 * Time: 10:53 PM
 */

namespace App\Services\Eloquent;


use App\Repositories\AuthorRepository;
use App\Services\AuthorService;

class EloquentAuthorService extends EloquentService implements AuthorService
{
    protected $manyToManyRelations = ['books'];
    public function __construct(AuthorRepository $repository)
    {
        parent::__construct($repository);
    }
}