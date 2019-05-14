<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 3/11/2019
 * Time: 12:07 PM
 */

namespace App\Services;


use App\Repositories\Repository;
use Illuminate\Database\Eloquent\Model;

interface Service
{
    public function createNewModel(array $attributes): ?Model;

    public function updateModel(array $attributes, $id): bool;

    public function deleteModel(array $attributes, $id): int;

    public function getModel(array $attributes, $id): ?Model;

    public function count(array $pairs = []): int;

    public function getRepository(): Repository;

    public function getAll(array $attributes= []);

    public function getBetween($needle, $from, $to, array $relations = []);

    public function getBy(array $pairs, array  $relations = []);
}