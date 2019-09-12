@extends('Templates.index')
@section('content')

        @if(session('sukses'))
        <div class="alert alert-success mx-md-n5" role="alert">
            {{session('sukses')}}
        </div>
        @endif
        <div class="row mx-md-n5">
            <div class="col-6">
                <h1>Edit Data User</h1>
            </div>
            <div class="col-lg-12">
                <form enctype="multipart/form-data" action="/user/{{$user->id}}/updateuser" method="POST">
                    {{csrf_field()}}
                    <div class="modal-body">
                        
                            <div class="form-group">
                                <label for="exampleInputEmail1">Nama</label>
                                <input type="text" class="form-control" name="nama" id="nama" aria-describedby="namaHelp" placeholder="Nama" value="{{$user->nama}}" required>
                                <small id="namaHelp" class="form-text text-muted">Isikan dengan nama user baru</small>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Email address</label>
                                <input type="email" class="form-control" name="email" id="email" aria-describedby="emailHelp" placeholder="Enter email" value="{{$user->email}}" required>
                                <small id="emailHelp" class="form-text text-muted">Isikan dengan email user baru</small>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Nomor Telefon</label>
                                <input type="text" class="form-control" name="no_telp" id="telp" maxlength="12" aria-describedby="telpHelp" placeholder="xxxxxxxxxxxx" value="{{$user->no_telp}}" required>
                                <small id="telpHelp" class="form-text text-muted">Isikan dengan nomor telefon user baru</small>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Jenis Kelamin</label>
                                <select class="custom-select" name="jenis_kelamin" id="jnskel" required>
                                    <option selected>Choose...</option>
                                    <option value="L" @if($user->jenis_kelamin == "L") selected @endif >Pria</option>
                                    <option value="P" @if($user->jenis_kelamin == "P") selected @endif>Wanita</option>
                                </select>
                                <small id="telpHelp" class="form-text text-muted">Pilih jenis kelamin untuk user baru</small>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Agama</label>
                                <input type="text" class="form-control" name="agama" id="agama" aria-describedby="agamaHelp" placeholder="Agama" value="{{$user->agama}}" required>
                                
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Alamat</label>
                                <!-- <input type="text" class="form-control" id="alamat" aria-describedby="alamatHelp" placeholder="Indonesia" required> -->
                                <textarea name="alamat" class="form-control" aria-label="With textarea">{{$user->alamat}}</textarea>
                                <small id="alamatHelp" class="form-text text-muted">Isikan alamat dari user baru</small>                            
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Username</label>
                                <input type="text" class="form-control" name="username" id="usrnm" aria-describedby="usernameHelp" placeholder="username" value="{{$user->username}}" required>
                                <small id="usernameHelp" class="form-text text-muted">Isikan username dari user baru</small>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputPassword1">Password</label>
                                <input type="password" class="form-control" name="password" id="exampleInputPassword1" value="{{$user->password}}" placeholder="Password">
                                <small id="alamatHelp" class="form-text text-muted">Isikan password dari user baru</small>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Role</label>
                                <select class="custom-select" name="status" id="role" required>
                                    <option selected>Choose...</option>
                                    <option value="adm" @if($user->status == "adm") selected @endif >Admin</option>
                                    <option value="usr" @if($user->status == "usr") selected @endif >User</option>
                                </select>
                                <small id="telpHelp" class="form-text text-muted">Pilih roles untuk user baru</small>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Avatar</label>                         
                            </div>
                            <div class="form-group">
                                @if($user->avatar != null)
                                <img src="{{ url('/uploads/avatar/'.$user->avatar) }}" style="width: 50px; height: 50px;">
                                <button onclick="showupload()" type="button" class="btn btn-secondary btn-sm">Change Avatar ?</button>
                                <small id="telpHelp" class="form-text text-muted">{{$user->avatar}}</small>
                                @else
                                <img src="/uploads/avatar/user.jpg" style="width: 50px; height: 50px;">
                                <button onclick="showupload()" type="button" class="btn btn-secondary btn-sm">Change Avatar ?</button>
                                <small id="telpHelp" class="form-text text-muted">User ini belum ada avatar</small>
                                @endif
                            </div>

                            <div class="form-group" id="uploadfile" style="display: none">
                                <label for="exampleFormControlFile1">Pilih Avatar Baru</label>
                                <input type="file" class="form-control-file" id="avatar" name="avatar" accept=".jpg, .jpeg, .png">
                            </div>
                        
                    </div>
                        <a class="btn btn-danger btn-close" href="/home/menuuser">Cancel</a>
                        <button type="submit" class="btn btn-warning">Update</button>
                </form>

            </div>
        </div>
    
@endsection