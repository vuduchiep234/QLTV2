<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 3/11/2019
 * Time: 12:16 PM
 */

namespace App\Http\Controllers\Requests;


use Illuminate\Support\Facades\Input;
use Illuminate\Validation\Rule;

abstract class GetRequest extends RestfulRequest
{
    abstract function filterRules(): array;

    abstract function sort(): array;

    abstract function relations(): array;

    public function rules(): array
    {
        return array_merge([
            'id' => 'int',
            'q' => 'string',
            'limit' => 'int|min:1|max:100',
            'offset' => 'int|min:0',
            'order' => 'string|in:asc,desc',
            'sort' => ['string', Rule::in($this->sort())],
            'relations' => 'array',
            'relations.*' => ['string', Rule::in($this->relations())]
        ], $this->filterRules());
    }

    public function getId(): ?int
    {
        return Input::get('id');
    }

    public function getQuery(): ?string
    {
        return Input::get('q');
    }

    public function getOffset(): int
    {
        return Input::get('offset') ?: 0;
    }

    public function getLimit(): int
    {
        return Input::get('limit') ?: 20;
    }

    public function getOrder(): string
    {
        return Input::get('order') ?: 'asc';
    }

    public function getSort(): string
    {
        return Input::get('sort') ?: 'id';
    }

    public function getRelations(): array
    {
        $relations = Input::get('relations');
        return $relations ? $relations : [];
    }

    public function getFilterRules(): array
    {
        return $this->filterRules();
    }
}