<?php
/**
 * Created by PhpStorm.
 * User: Phí Văn Tuấn
 * Date: 7/4/2019
 * Time: 16:56
 */

namespace App\Http\Controllers;


class LoginController extends Controller
{
    public function login(){
        return view('login.login');
    }
}
