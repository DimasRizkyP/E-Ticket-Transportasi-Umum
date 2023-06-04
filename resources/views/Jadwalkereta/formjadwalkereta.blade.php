@extends('dasbord.layout.app')

@section('judul','Data Jadwal Kereta')

@section('content')
<form action="{{isset($data) ? route ('Datajadwalkereta.tambah.update',$data->id_jadwal_kereta) : route('Datajadwalkereta.tambah.simpan')}}" method="post">
    @csrf
    <div class="row">
        <div class="col-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Tambah Data Jadwal Kereta</h6>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="id_jadwal_kereta">Id Jadwal Kereta</label>
                        <input type="text" class="form-control" id="id_jadwal_kereta" name="id_jadwal_kereta" value="{{isset($data)? $data->id_jadwal_kereta : '' }}">
                    </div>
                    <div class="form-group">
                        <label for="id_kereta">Nama Kereta</label>
                        <select name="id_kereta" id="id_kereta" class="custom-select">
                        <option value="">- Pilih -</option>
                            @foreach ($namakereta as $item)
                            <option value="{{$item->id_kereta}}">{{ $item->nama_kereta }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>ID Rute Kereta</label>
                        <select name="id_rute_kereta" id="id_rute_kereta" class="custom-select">
                        <option value="">- Pilih -</option>
                            @foreach ($rutekereta as $item)
                            <option value="{{$item->id_rute_kereta}}">{{ $item->id_rute_kereta }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="tanggal_berangkat">Tanggal berangkat</label>
                        <input type="date" class="form-control" id="tanggal_berangkat" name="tanggal_berangkat" value="{{isset($data)? $data->tanggal_berangkat : '' }}">
                    </div>
                    <div class="form-group">
                        <label for="tanggal_sampai">Tanggal Sampai</label>
                        <input type="date" class="form-control" id="tanggal_sampai" name="tanggal_sampai"value="{{isset($data)? $data->tanggal_sampai : '' }}">
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
