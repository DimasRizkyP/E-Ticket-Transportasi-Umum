@extends('dasbord.layout.app')

@section('judul','Data Terminal')

@section('content')
<form action="{{route('Dataterminal.update',$dataterminal->id_terminal)}}" method="post">
    @csrf
    <div class="row">
        <div class="col-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Tambah Data Terminal</h6>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="id_terminal">Id Terminal</label>
                        <input type="text" class="form-control" id="id_terminal" value="{{$dataterminal->id_terminal}}" name="id_terminal">
                    </div>
                    <div class="form-group">
                        <label for="nama_terminal">Nama Terminal</label>
                        <input type="text" class="form-control" id="nama_terminal" value="{{$dataterminal->nama_terminal}}" name="nama_terminal">
                    </div>
                    <div class="form-group">
                        <label for="kota">Kota</label>
                        <input type="text" class="form-control" id="kota" value="{{$dataterminal->kota}}" name="kota">
                    </div>
                    <div class="form-group">
                        <label for="negara">Negara</label>
                        <input type="text" class="form-control" id="negara" value="{{$dataterminal->negara}}" name="negara">
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
