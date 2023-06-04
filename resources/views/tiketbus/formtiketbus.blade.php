@extends('dasbord.layout.app')

@section('judul','Data Jadwal Pesawat')

@section('content')
<form action="{{isset($data) ? route ('Datatiketbus.tambah.update',$data->id_tiket_bus) : route('Datatiketbus.tambah.simpan')}}" method="post">
    @csrf
    <div class="row">
        <div class="col-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Tambah Data Tiket bus</h6>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="id_tiket_bus">Id Tiket Bus</label>
                        <input type="text" class="form-control" id="id_tiket_bus" name="id_tiket_bus" value="{{isset($data)? $data->id_tiket_bus: '' }}">
                    </div>
                    <div class="form-group">
                        <label for="id_jadwal_bus">Id Jadwal Bus</label>
                        <select name="id_jadwal_bus" id="id_jadwal_bus" class="custom-select">
                        <option value="">- Pilih -</option>
                            @foreach ($jadwalbus as $item)
                            <option value="{{$item->id_jadwal_bus}}">{{ $item->id_jadwal_bus }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="harga">Harga</label>
                        <input type="text" class="form-control" id="harga" name="harga" value="{{isset($data)? $data->harga: '' }}">
                    </div>
                    <div class="form-group">
                        <label for="tanggal_booking">Tanggal Booking</label>
                        <input type="date" class="form-control" id="tanggal_booking" name="tanggal_booking"value="{{isset($data)? $data->tanggal_booking : '' }}">
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
