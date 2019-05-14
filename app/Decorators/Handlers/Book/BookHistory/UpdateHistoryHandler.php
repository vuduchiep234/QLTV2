<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 3/16/2019
 * Time: 3:23 PM
 */

namespace App\Decorators\Handlers\Book\BookHistory;



use App\Decorators\Handlers\HandlerResponseCreators\HandlerResponse;

class UpdateHistoryHandler extends BookHistoryHandler
{
    private static $USER_ID_ERROR_MESSAGE = 'Missing historyId key in handler attributes';

    public function handle(array &$attributes): HandlerResponse
    {
        if (!array_key_exists('historyId', $attributes)) {
            return $this->createHandlerResponse(self::$USER_ID_ERROR_MESSAGE, false);
        }

        $historyService = $this->createHandlerService();

        //gather input data
        $historyId = $attributes['historyId'];

        //set up update Data
        $historyAttribute['state'] = false;

        //update
        $updateChecker = $historyService->updateModel($historyAttribute, $historyId);

        //return message if error occurs
        if ($updateChecker == false) {
            return $this->createHandlerResponse($this->getServiceMessage($historyService), false);
        }

        return parent::handle($attributes);
    }
}