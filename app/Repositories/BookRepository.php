<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 3/11/2019
 * Time: 10:18 PM
 */

namespace App\Repositories;


interface BookRepository extends Repository
{
    public function getByName(string $name, int $limit);
}