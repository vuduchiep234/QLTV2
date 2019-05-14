<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 4/4/2019
 * Time: 1:31 AM
 */

namespace App\Http\Controllers\Requests\API\Card;


use App\Http\Controllers\Requests\PatchRequest;

class CardRenewedRequest extends PatchRequest
{
    public function rules(): array
    {
        return [
            'card_id' => 'int|exists:cards,id'
        ];
    }
}