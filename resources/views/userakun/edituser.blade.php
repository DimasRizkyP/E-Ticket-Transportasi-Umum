@extends('dasbord.layout.app')

@section('judul','Data User')

@section('content')
<form action="{{route('Datauser.update',$datauser->id_user)}}" method="post">
    @csrf
    <div class="row">
        <div class="col-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Tambah Data User</h6>
                </div>
                <div class="card-body">
                <div class="form-group">
                        <label for="id_user">Id_user</label>
                        <input type="text" class="form-control" id="id_user" value="{{$data->id_user}}" name="id_user">
                    </div>
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" class="form-control" id="username" value="{{$data->username}}" name="username">
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" id="password" value="{{$data->password}}" name="password">
                    </div>
                    <div class="form-group">
                        <label for="role">Piih Role</label>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="role" id="admin" value="admin" {{ old('role',
                  $data->role)=='admin' ? 'checked' : '' }}>
                            <label class="form-check-label" for="admin">
                                Admin
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="role" id="customer" value="customer" {{ old('role',
                  $data->role)=='customer'? 'checked' : '' }}>
                            <label class="form-check-label" for="user">
                                Customer
                            </label>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <button type="sumbit" class="btn btn-primary">Simpan</button>
                </div>
            </div>
        </div>
    </div>
</form>


@endsection
