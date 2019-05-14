<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 4/4/2019
 * Time: 1:46 AM
 */

namespace App\Decorators\Handlers\Book\BookCopy;


trait CreateBookID
{
    private static $SECRET_LEN = 4;

    public function createSecret(): String
    {
        $sourceStr = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $sourceLength = strlen($sourceStr);
        $outputString = '';

        for ($i = 0; $i <= self::$SECRET_LEN; $i++) {
            $outputString .= $sourceStr[rand(0, $sourceLength - 1)];
        }

        return $outputString;
    }
}