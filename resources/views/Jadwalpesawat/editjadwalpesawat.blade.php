@extends('dasbord.layout.app')

@section('judul','Data Jadwal Pesawat')

@section('content')
<form action="{{route('Datajadwalpesawat.update',$datajadwalpesawat->id_jadwal_pesawat)}}" method="post">
    @csrf
    <div class="row">
        <div class="col-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Edit Data Jadwal Pesawat</h6>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="id_jadwal_pesawat">Id Rute Pesawat</label>
                        <input type="text" class="form-control" id="id_jadwal_pesawat" value="{{$datajadwalpesawat->id_jadwal_pesawat}}" name="id_jadwal_pesawat">
                    </div>
                    <div class="form-group">
                        <label for="id_pesawat">Nama Pesawat</label>
                        <select name="id_pesawat" id="id_pesawat" class="custom-select">
                            @foreach ($namapesawat as $item)
                            <option value="{{$item->id_pesawat}}">{{ $item->nama_pesawat }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>ID Rute Pesawat</label>
                        <select name="id_rute_pesawat" id="id_rute_pesawat" class="custom-select">
                            @foreach ($rutepesawat as $item)
                            <option value="{{$item->id_rute_pesawat}}">{{ $item->id_rute_pesawat }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="tanggal_berangkat">Tanggal Berangkat</label>
                        <input type="date" class="form-control" id="tanggal_berangkat" value="{{$datajadwalpesawat->tanggal_berangkat}}" name="tanggal_berangkat">
                    </div>
                    <div class="form-group">
                        <label for="tanggal_sampai">Tanggal Sampai</label>
                        <input type="date" class="form-control" id="tanggal_sampai" value="{{$datajadwalpesawat->tanggal_sampai}}" name="tanggal_sampai">
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
