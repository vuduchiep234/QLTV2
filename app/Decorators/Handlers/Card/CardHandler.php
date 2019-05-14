<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 4/4/2019
 * Time: 12:56 AM
 */

namespace App\Decorators\Handlers\Card;


use App\Decorators\Handlers\EloquentBaseHandler;
use App\Models\Card;
use App\Repositories\Eloquent\EloquentCardRepository;
use App\Services\Eloquent\EloquentCardService;
use App\Services\Service;

class CardHandler extends EloquentBaseHandler
{

    public function createHandlerService(): ?Service
    {
        $card = new Card();
        $repository = new EloquentCardRepository($card);
        return new EloquentCardService($repository);
    }
}