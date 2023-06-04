@extends('dasbord.layout.app')

@section('judul','Data Pengguna')

@section('content')
<form action="{{route('Datapengguna.update',$datapengguna->id_pengguna)}}" method="post">
    @csrf
    <div class="row">
        <div class="col-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Tambah Data Pengguna</h6>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="id_pengguna">Id Pengguna</label>
                        <input type="text" class="form-control" id="id_pengguna" value="{{$data->id_pegguna}}" name="id_pengguna">
                    </div>
                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input type="text" class="form-control" id="nama" value="{{$data->nama}}" name="nama">
                    </div>
                    <div class="form-group">
                        <label for="no_ktp">No Ktp</label>
                        <input type="text" class="form-control" id="no_ktp" value="{{$data->no_ktp}}" name="no_ktp">
                    </div>
                    <div class="form-group">
                        <label for="warga_negara">Warga Negara</label>
                        <input type="text" class="form-control" id="warga_negara" value="{{$data->watga_negara}}" name="warga_negara">
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
