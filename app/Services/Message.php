<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 3/12/2019
 * Time: 8:20 AM
 */

namespace App\Services;


interface Message
{
    public function getMessage(): string;

    public function setMessage(string $message);
}