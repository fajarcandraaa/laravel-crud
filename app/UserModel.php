<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserModel extends Model
{
    protected $table    =   'users';
    protected $fillable =   ['nama','email','no_telp','jenis_kelamin','agama','alamat','username','password','avatar','status'];
}
