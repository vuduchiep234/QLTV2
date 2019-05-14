<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 4/4/2019
 * Time: 12:55 AM
 */

namespace App\Repositories\Eloquent;


use App\Models\Card;
use App\Repositories\CardRepository;

class EloquentCardRepository extends EloquentRepository implements CardRepository
{
    public function __construct(Card $model)
    {
        parent::__construct($model);
    }
}