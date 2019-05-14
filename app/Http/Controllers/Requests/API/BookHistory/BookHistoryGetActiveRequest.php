<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 3/24/2019
 * Time: 7:54 PM
 */

namespace App\Http\Controllers\Requests\API\BookHistory;


class BookHistoryGetActiveRequest extends BookHistoryGetRequest
{
    public function filterRules(): array
    {
        return array_merge([
            'userId' => 'int|required|exists:users,id'
        ], parent::filterRules());
    }
}