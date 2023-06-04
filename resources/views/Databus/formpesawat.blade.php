@extends('dasbord.layout.app')

@section('judul','Data Pesawat')

@section('content')
<form action="{{isset($data) ? route ('Datapesawat.tambah.update',$data->id_pesawat) : route('Datapesawat.tambah.simpan')}}" method="post">
    @csrf
    <div class="row">
        <div class="col-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Tambah Data Pesawat</h6>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="id_pesawat">Id Pesawat</label>
                        <input type="text" class="form-control" id="id_pesawat" name="id_pesawat" value="{{isset($data)? $data->id_pesawat : '' }}">
                    </div>
                    <div class="form-group">
                        <label for="nama_pesawat">Nama pesawat</label>
                        <input type="text" class="form-control" id="nama_pesawat" name="nama_pesawat" value="{{isset($data)? $data->nama_pesawat : '' }}">
                    </div>
                    <div class="form-group">
                        <label for="kelas">Kelas</label>
                        <input type="text" class="form-control" id="kelas" name="kelas"value="{{isset($data)? $data->kelas: '' }}">
                    </div>
                    <div class="form-group">
                        <label for="kuota">Kuota </label>
                        <input type="text" class="form-control" id="kuota" name="kuota"value="{{isset($data)? $data->kuota : '' }}">
                    </div>
                    <div class="form-group">
                        <label for="perusahaan">Perusahaan</label>
                        <input type="text" class="form-control" id="perusahaan" name="perusahaan"value="{{isset($data)? $data->perusahaan : '' }}">
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
