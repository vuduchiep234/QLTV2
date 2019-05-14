<?php


namespace App\Http\Controllers;


use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function getRegister(){
        return view('register.register');
    }
    public function register(Request $request){
        $this->validate($request,[
            'name'=>'required',
            'email'=>'required',
            'password'=>'required'
        ]);
        $user=new User();
        $user->name = $request->get('name');
        $user->email = $request->get('email');
        $user->password = Hash::make($request->get('password'));
        $user->role_id = 1;
        $user->save();
        return view('admin.master');
    }
}
