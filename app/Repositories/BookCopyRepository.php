<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 3/11/2019
 * Time: 10:18 PM
 */

namespace App\Repositories;


use Illuminate\Database\Eloquent\Model;

interface BookCopyRepository extends Repository
{
    public function getFirst(array $attributes, array $relations): Model;
}