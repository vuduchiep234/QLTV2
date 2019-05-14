<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 4/4/2019
 * Time: 12:56 AM
 */

namespace App\Services\Eloquent;


use App\Repositories\CardRepository;
use App\Services\CardService;

class EloquentCardService extends EloquentService implements CardService
{
    public function __construct(CardRepository $repository)
    {
        parent::__construct($repository);
    }
}