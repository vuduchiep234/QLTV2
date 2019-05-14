<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 3/11/2019
 * Time: 10:19 PM
 */

namespace App\Repositories;


interface BookHistoryRepository extends Repository
{
    public function getAllActive(array $attributes = []);
}