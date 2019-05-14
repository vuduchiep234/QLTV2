<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 3/11/2019
 * Time: 10:16 PM
 */

namespace App\Services;



interface BookCopyService extends Service
{
    public function getFirst(array $pairs, array $relations = []);
}