<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 3/16/2019
 * Time: 3:50 PM
 */

namespace App\Http\Controllers\API;


use App\Decorators\BookHistoryDecorator\RentBook\RentBookDecorator;
use App\Decorators\BookHistoryDecorator\RentBook\RentBookTransactionDecorator;
use App\Decorators\BookHistoryDecorator\ReturnBook\ReturnBookDecorator;
use App\Decorators\BookHistoryDecorator\ReturnBook\ReturnBookTransactionDecorator;
use App\Http\Controllers\Requests\API\BookHistory\BookHistoryGetActiveRequest;
use App\Http\Controllers\Requests\API\BookHistory\BookRentedRequest;
use App\Http\Controllers\Requests\API\BookHistory\BookHistoryDeleteRequest;
use App\Http\Controllers\Requests\API\BookHistory\BookHistoryGetRequest;
use App\Http\Controllers\Requests\API\BookHistory\BookHistoryPatchRequest;
use App\Http\Controllers\Requests\API\BookHistory\BookHistoryPostRequest;

use App\Http\Controllers\Requests\API\BookHistory\BookReturnRequest;
use App\Services\BookHistoryService;

class BookHistoryController extends APIController
{
    public function __construct(BookHistoryService $service)
    {
        parent::__construct($service);
    }

    public function get(BookHistoryGetRequest $request, int $id = null)
    {
        return parent::_get($request, $id);
    }

    public function post(BookHistoryPostRequest $request)
    {
        return parent::_post($request);
    }

    public function patch(BookHistoryPatchRequest $request, int $id = null)
    {
        return parent::_patch($request, $id);
    }

    public function delete(BookHistoryDeleteRequest $request, int $id = null)
    {
        return parent::_delete($request, $id);
    }

    public function rent(BookRentedRequest $request, int $id = null)
    {
        /**
         * @var BookHistoryService $historyService
         */
        $id = ($id == null) ? $request->get('user_id') : $id;

        $historyService = $this->getService();
        $enhancedService = new RentBookDecorator($historyService);
        $transactionService = new RentBookTransactionDecorator($enhancedService);

        $updateChecker =  $transactionService->updateModel($request->all(), $id);
        if ($updateChecker == true) {
            return ['Success'];
        }
        return['Failed'];
    }

    public function returnBook(BookReturnRequest $request, int $id = null)
    {
        /**
         * @var BookHistoryService $historyService
         */

        $id = ($id == null) ? $request->get('user_id') : $id;
        $historyService = $this->getService();
        $enhancedService = new ReturnBookDecorator($historyService);
        $transactionService = new ReturnBookTransactionDecorator($enhancedService);

        $updateChecker = $transactionService->updateModel($request->all(), $id);
        if ($updateChecker == true) {
            return ['Success'];
        }
        return['Failed'];
    }

    public function getActiveHistories(BookHistoryGetActiveRequest $request)
    {
        /**
         * @var BookHistoryService $historyService
         */
        $historyService = $this->getService();
        return $historyService->getActiveHistories($request->all());
    }

    public function all(BookHistoryGetRequest $request)
    {
        return parent::_all($request);
    }
};