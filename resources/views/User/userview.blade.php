@extends('Templates.index')
@section('content')

        @if(session('sukses'))
        <div class="alert alert-success mx-md-n5" role="alert">
            {{session('sukses')}}
        </div>
        @endif
        <div class="row mx-md-n5">
            <div class="col-6">
                <h1>Data User</h1>
            </div>
            <div class="col-6">
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-outline-primary btn-sm float-right" data-toggle="modal" data-target="#exampleModal">
                Tambah Data User
                </button>
            </div>
            
            <table class="table table-hover">
                <thead class="thead-dark">
                    <tr align='center'>
                        <th>NAMA</th>
                        <th>EMAIL</th>
                        <th>NO. TELP</th>
                        <th>JENIS KELAMIN</th>
                        <th>AGAMA</th>
                        <th>ALAMAT</th>
                        <th>AVATAR</th>
                        <th>AKSI</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($data_user as $user)
                    <tr align='center'>
                        <td>{{ $user->nama }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->no_telp }}</td>
                        <td>{{ $user->jenis_kelamin }}</td>
                        <td>{{ $user->agama }}</td>
                        <td>{{ $user->alamat }}</td>
                        @if($user->avatar != null)
                        <td><img src="{{ url('/uploads/avatar/'.$user->avatar) }}" style="width: 50px; height: 50px;"></td>
                        @else
                        <td><img src="/uploads/avatar/user.jpg" style="width: 50px; height: 50px;"></td>
                        @endif
                        <td>
                            <a href="/user/{{$user->id}}/edituser" class="btn btn-warning btn-sm">Edit</a>
                            <a href="/user/{{$user->id}}/deleteuser" class="btn btn-danger btn-sm" onclick="return confirm('Apakah anda yakin user ini mau dihapus ?')">Delete</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody> 
            </table>
        </div>
   
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Data User Baru</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="inputuser" enctype="multipart/form-data" action="/user/createuser" method="POST">
                    {{csrf_field()}}
                    <div class="modal-body">
                        
                            <div class="form-group">
                                <label for="exampleInputEmail1">Nama</label>
                                <input type="text" class="form-control" name="nama" id="nama" aria-describedby="namaHelp" placeholder="Nama" required>
                                <small id="namaHelp" class="form-text text-muted">Isikan dengan nama user baru</small>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Email address</label>
                                <input type="email" class="form-control" name="email" id="email" aria-describedby="emailHelp" placeholder="Enter email" required>
                                <small id="emailHelp" class="form-text text-muted">Isikan dengan email user baru</small>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Nomor Telefon</label>
                                <input type="text" class="form-control" name="no_telp" id="telp" maxlength="12" aria-describedby="telpHelp" placeholder="xxxxxxxxxxxx" required>
                                <small id="telpHelp" class="form-text text-muted">Isikan dengan nomor telefon user baru</small>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Jenis Kelamin</label>
                                <select class="custom-select" name="jenis_kelamin" id="jnskel" required>
                                    <option selected>Choose...</option>
                                    <option value="L">Pria</option>
                                    <option value="P">Wanita</option>
                                </select>
                                <small id="telpHelp" class="form-text text-muted">Pilih jenis kelamin untuk user baru</small>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Agama</label>
                                <input type="text" class="form-control" name="agama" id="agama" aria-describedby="agamaHelp" placeholder="Agama" required>
                                
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Alamat</label>
                                <!-- <input type="text" class="form-control" id="alamat" aria-describedby="alamatHelp" placeholder="Indonesia" required> -->
                                <textarea name="alamat" class="form-control" aria-label="With textarea"></textarea>
                                <small id="alamatHelp" class="form-text text-muted">Isikan alamat dari user baru</small>                            
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Username</label>
                                <input type="text" class="form-control" name="username" id="usrnm" aria-describedby="usernameHelp" placeholder="username" required>
                                <small id="usernameHelp" class="form-text text-muted">Isikan username dari user baru</small>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputPassword1">Password</label>
                                <input type="password" class="form-control" name="password" id="exampleInputPassword1" placeholder="Password">
                                <small id="alamatHelp" class="form-text text-muted">Isikan password dari user baru</small>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Role</label>
                                <select class="custom-select" name="status" id="role" required>
                                    <option selected>Choose...</option>
                                    <option value="adm">Admin</option>
                                    <option value="usr">User</option>
                                </select>
                                <small id="telpHelp" class="form-text text-muted">Pilih roles untuk user baru</small>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputPassword1">Avatar</label>
                                <input type="file" class="form-control-file" id="avatar" name="avatar" accept=".jpg, .jpeg, .png">
                            </div>
                        
                    </div>
                    <div class="modal-footer">
                        <button type="button" onclick="myFunction()" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection