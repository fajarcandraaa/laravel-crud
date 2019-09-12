<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\UserModel;
use Storage;
use DateTime;

class UserController extends Controller
{
    public function index()
    {
        $data   =   \App\UserModel::all();
        return view('User.userview', ['data_user' => $data]);
    }

    public function createuser(Request $request)
    {
        
        $data                   =   new UserModel();
        $data->nama             =   $request->input('nama');
        $data->email            =   $request->input('email');
        $data->no_telp          =   $request->input('no_telp');
        $data->jenis_kelamin    =   $request->input('jenis_kelamin');
        $data->agama            =   $request->input('agama');
        $data->alamat           =   $request->input('alamat');
        $data->username         =   $request->input('username');
        $data->password         =   bcrypt($request->input('password'));
        $data->status           =   $request->input('status');  
        $file                   =   $request->file('avatar');
        $ext                    =   $file->getClientOriginalExtension();
        $newName                =   "foto-".$request->input('nama')."-".rand(100000,1001238912).".".$ext;
        $file->move('uploads/avatar',$newName);
        $data->avatar           =   $newName;

        $time       = date('dmYHis');
        $formatdata = $request->input('nama').', '.$request->input('email').', '.$request->input('no_telp').', '.$request->input('jenis_kelamin').', '.$request->file('avatar');
        $namaFile   = 'Create - '.$request->input('nama').'-'.$time.'.txt';   
        
        $data->save();
        Storage::put($namaFile,$formatdata);
        return redirect('/home/menuuser')->with('sukses','Data berhasil diinput !');
    }

    public function edituser($id)
    {
        $user   = \App\UserModel::find($id);
        return view('User.edituser',['user' => $user]);
    }

    public function updateuser(Request $request, $id)
    {
        $data   = UserModel::find($id);
        $data->nama             =   $request->get('nama');
        $data->email            =   $request->get('email');
        $data->no_telp          =   $request->get('no_telp');
        $data->jenis_kelamin    =   $request->get('jenis_kelamin');
        $data->agama            =   $request->get('agama');
        $data->alamat           =   $request->get('alamat');
        $data->username         =   $data->username;
        $data->password         =   $data->password;
        $data->status           =   $request->get('status');  
        $file                   =   $request->file('avatar');
        $ext                    =   $file->getClientOriginalExtension();
        $newName                =   "foto-".$request->get('nama')."-".rand(100000,1001238912).".".$ext;
        $file->move('uploads/avatar',$newName);
        $data->avatar           =   $newName;
        
        $time       = date('dmYHis');
        $formatdata = $request->get('nama').', '.$request->get('email').', '.$request->get('no_telp').', '.$request->get('jenis_kelamin').', '.$request->file('avatar');
        $namaFile   = 'Update - '.$request->get('nama').'-'.$time.'.txt';
        
        $data->save();
        Storage::put($namaFile,$formatdata);
        return redirect('/home/menuuser')->with('sukses','Data berhasil diupdate !');
    }

    public function deleteuser($id)
    {
        $user   = \App\UserModel::find($id);
        $user->delete($user);
        return redirect('/home/menuuser')->with('sukses','Data berhasil dihapus !');
    }
}
