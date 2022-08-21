<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use App\Models\User;


class HomeController extends Controller
{
    public function index(){
        $role=Auth::user()->role;

        if($role=='1'){
            return view('admin');
        }
        else{
            return view('dashboard');
        }
    }

    public function addadmin(Request $request){

        // saveing data to database
        
        $data=new user;

        $data->name=$request->name;
        $data->email=$request->email;
        $data->password=bcrypt($request->password);

        $data->role='1';

        $data->save();

        return redirect()->back();
    }
}
