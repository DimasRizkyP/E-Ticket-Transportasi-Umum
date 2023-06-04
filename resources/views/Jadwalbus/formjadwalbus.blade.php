@extends('dasbord.layout.app')

@section('judul','Data Jadwal Bus')

@section('content')
<form action="{{isset($data) ? route ('Datajadwalbus.tambah.update',$data->id_jadwal_bus) : route('Datajadwalbus.tambah.simpan')}}" method="post">
    @csrf
    <div class="row">
        <div class="col-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Tambah Data Jadwal Bus</h6>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="id_jadwal_bus">Id Jadwal Bus</label>
                        <input type="text" class="form-control" id="id_jadwal_bus" name="id_jadwal_bus" value="{{isset($data)? $data->id_jadwal_bus : '' }}">
                    </div>
                    <div class="form-group">
                        <label for="id_bus">Nama Bus</label>
                        <select name="id_bus" id="id_bus" class="custom-select">
                        <option value="">- Pilih -</option>
                            @foreach ($namabus as $item)
                            <option value="{{$item->id_bus}}">{{ $item->nama_bus }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>ID Rute Bus</label>
                        <select name="id_rute_bus" id="id_terminal" class="custom-select">
                        <option value="">- Pilih -</option>
                            @foreach ($rutebus as $item)
                            <option value="{{$item->id_rute_bus}}">{{ $item->id_rute_bus }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="tanggal_berangkat">Tanggal berangkat</label>
                        <input type="date" class="form-control" id="tanggal_berangkat" name="tanggal_berangkat" value="{{isset($data)? $data->tanggal_berangkat : '' }}">
                    </div>
                    <div class="form-group">
                        <label for="tanggal_sampai">Tanggal Sampai</label>
                        <input type="date" class="form-control" id="tanggal_sampai" name="tanggal_sampai" value="{{isset($data)? $data->tanggal_sampai : '' }}">
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
