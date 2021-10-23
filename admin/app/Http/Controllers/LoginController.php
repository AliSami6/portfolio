<?php

namespace App\Http\Controllers;
use App\Models\Admin;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index()
    {
       return view('Login');
    }

    public function onLogout(Request $request){
        $request->session()->flush();
        return redirect('/Login');
    }

    public function onLogin(Request $request){
       $user= $request->input('user');
       $pass= $request->input('pass');
       $countValue=Admin::where('username','=',$user)->where('password','=',$pass)->count();

        if($countValue==1){
            $request->session()->put('user',$user);
            return 1;
        }
        else{
            return 0;
        }

    }

}
