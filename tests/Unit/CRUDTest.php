<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\UserModel;

class CRUDTest extends TestCase
{
    use DatabaseTransactions;
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testExample()
    {
        $userscreate  = UserModel::create([
            "nama"          =>  "Galuh",
            "email"         =>  "galuh@gmail.com",
            "no_telp"       =>  "08123654789",
            "jenis_kelamin" => "P",
            "agama"         =>  "Islam",
            "alamat"        =>  "Kediri",
            "username"      =>  "galuh",
            "password"      =>  "123456",
            "avatar"        =>  "",
            "status"        =>  "usr"
        ]);

        $this->assertDatabaseHas('users',[
            "nama"          =>  "Galuh",
            "email"         =>  "galuh@gmail.com",
            "no_telp"       =>  "08123654789",
            "jenis_kelamin" => "P",
            "agama"         =>  "Islam",
            "alamat"        =>  "Kediri",
            "username"      =>  "galuh",
            "password"      =>  "123456",
            "avatar"        =>  "",
            "status"        =>  "usr"
        ]);

        $updateusers    =   UserModel::find($userscreate->id)->update([
            "nama"          =>  "Galuhhhh",
            "email"         =>  "galuh@gmail.com",
            "no_telp"       =>  "08123654789",
            "jenis_kelamin" => "P",
            "agama"         =>  "Islam",
            "alamat"        =>  "Kediri",
            "username"      =>  "galuh",
            "password"      =>  "123456",
            "avatar"        =>  "",
            "status"        =>  "usr"
        ]);

        $this->assertDatabaseHas('users',[
            "nama"          =>  "Galuhhhh",
            "email"         =>  "galuh@gmail.com",
            "no_telp"       =>  "08123654789",
            "jenis_kelamin" => "P",
            "agama"         =>  "Islam",
            "alamat"        =>  "Kediri",
            "username"      =>  "galuh",
            "password"      =>  "123456",
            "avatar"        =>  "",
            "status"        =>  "usr"
        ]);

        UserModel::destroy($userscreate->id);
        $this->assertDatabaseMissing('users',[
            "nama"          =>  "Galuhhhh",
            "email"         =>  "galuh@gmail.com",
            "no_telp"       =>  "08123654789",
            "jenis_kelamin" => "P",
            "agama"         =>  "Islam",
            "alamat"        =>  "Kediri",
            "username"      =>  "galuh",
            "password"      =>  "123456",
            "avatar"        =>  "",
            "status"        =>  "usr" 
        ]);
        // $this->assertTrue(true);
    }
}
