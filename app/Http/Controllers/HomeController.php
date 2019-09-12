<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\UserModel;
use Auth;
use Hash;

class HomeController extends Controller
{
    public function index()
    {
        if (!Session::get('login')) {
            return redirect('/')->with('alert','Kamu harus login dulu');
        }
        else{
            return view('Home.homeindex');
        }
    }

    public function loginpage()
    {
        if (!Session::get('login')) {
            return view('login');
        }
        else{
            return view('Home.homeindex')->with('alert','Anda sudah melakukan login');
        }
    }

    public function login(Request $request)
    {
        $email      = $request->email;
        $password   = $request->password;
        $data       = UserModel::where('email',$email)->first();
        if($data){ 
            if(Hash::check($password,$data->password)){
                Session::put('name',$data->nama);
                Session::put('email',$data->email);
                Session::put('login',TRUE);
                return redirect('/home');
            }
            else{
                return redirect('/')->with('alert','Mohon dicek kembali email atau passwordnya !');
            }
        }
        else{
            return redirect('/')->with('alert','Password atau Email, Salah!');
        }
    }

    public function logout()
    {
        Session::flush();
        return redirect('/')->with('alert','Kamu sudah logout');
    }

    public function validation($request)
    {
        return $this->validate($request, [
            'email'     => 'required|email|max:255',
            'password'  =>  'required|max:255',
        ]);
    }

    public function menuuser()
    {
        if (!Session::get('login')) {
            return redirect('/')->with('alert','Kamu harus login dulu');
        }
        else{
            $data   =   \App\UserModel::all();
            return view('User.userview', ['data_user' => $data]);
        }  
    }

    public function error()
    {
        return view('Templates.404');
    }
}
