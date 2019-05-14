<?php


namespace App\Http\Controllers\Requests\API\Book;


class BookSearchRequest extends BookGetRequest
{
    public function filterRules(): array
    {
        return [
            'q' => 'required'
        ];
    }
}