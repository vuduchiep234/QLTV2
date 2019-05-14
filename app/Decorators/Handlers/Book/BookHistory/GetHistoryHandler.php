<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 3/24/2019
 * Time: 7:08 PM
 */

namespace App\Decorators\Handlers\Book\BookHistory;


use App\Decorators\Handlers\HandlerResponseCreators\HandlerResponse;
use App\Services\BookHistoryService;

class GetHistoryHandler extends BookHistoryHandler
{
    public function handle(array &$attributes): HandlerResponse
    {
        /**
         * @var BookHistoryService $historyService
         */
        $historyService = $this->createHandlerService();

        $attributes['activeHistory'] = $historyService->getActiveHistories($attributes);

        return parent::handle($attributes);
    }
}