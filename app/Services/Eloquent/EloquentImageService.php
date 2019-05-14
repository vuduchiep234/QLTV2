<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 3/11/2019
 * Time: 11:00 PM
 */

namespace App\Services\Eloquent;


use App\Repositories\ImageRepository;
use App\Services\ImageService;

class EloquentImageService extends EloquentService implements ImageService
{
    protected $manyToManyRelations = ['books'];

    public function __construct(ImageRepository $repository)
    {
        parent::__construct($repository);
    }
}