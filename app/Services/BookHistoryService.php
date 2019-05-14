<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 3/11/2019
 * Time: 10:17 PM
 */

namespace App\Services;


interface BookHistoryService extends Service
{
    public function getActiveHistories(array $attributes = []);
}