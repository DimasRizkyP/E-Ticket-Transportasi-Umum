@extends('dasbord.layout.app')

@section('judul','Data Kereta')

@section('content')
<form action="{{isset($data) ? route ('Datakereta.tambah.update',$data->id_kereta) : route('Datakereta.tambah.simpan')}}" method="post">
    @csrf
    <div class="row">
        <div class="col-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Tambah Data Kereta</h6>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="id_kereta">Id Kereta</label>
                        <input type="text" class="form-control" id="id_kereta" name="id_kereta" value="{{isset($data)? $data->id_kereta : '' }}">
                    </div>
                    <div class="form-group">
                        <label for="nama_kereta">Nama kereta</label>
                        <input type="text" class="form-control" id="nama_kereta" name="nama_kereta" value="{{isset($data)? $data->nama_kereta : '' }}">
                    </div>
                    <div class="form-group">
                        <label for="kelas">Kelas</label>
                        <input type="text" class="form-control" id="kelas" name="kelas"value="{{isset($data)? $data->kelas: '' }}">
                    </div>
                    <div class="form-group">
                        <label for="kuota_kereta">Kuota Kereta</label>
                        <input type="text" class="form-control" id="kuota_kereta" name="kuota_kereta"value="{{isset($data)? $data->kuota_kereta : '' }}">
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
