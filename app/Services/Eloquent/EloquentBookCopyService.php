<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 3/11/2019
 * Time: 10:54 PM
 */

namespace App\Services\Eloquent;


use App\Repositories\BookCopyRepository;
use App\Services\BookCopyService;
use Illuminate\Database\Eloquent\Model;

class EloquentBookCopyService extends EloquentService implements BookCopyService
{
    public function __construct(BookCopyRepository $repository)
    {
        parent::__construct($repository);
    }

    public function getFirst(array $pairs, array $relations = [])
    {
        if (count($pairs) == 0) {
            return null;
        }
        $conditions = [];
        foreach ($pairs as $pair) {
            $condition[] = $pair['needle'];
            $condition[] = '=';
            $condition[] = $pair['value'];
            array_push($conditions, $condition);
            $condition = [];
        }

        return $this->getRepository()->getBy($conditions, $relations);
    }
}