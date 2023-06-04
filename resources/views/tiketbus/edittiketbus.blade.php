@extends('dasbord.layout.app')

@section('judul','Data Tiket Bus')

@section('content')
<form action="{{route('Datatiketbus.update',$datatiketbus->id_tiket_bus)}}" method="post">
    @csrf
    <div class="row">
        <div class="col-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Tambah Data Tiket Bus</h6>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="id_tiket_bus">Id Tiket Bus</label>
                        <input type="text" class="form-control" id="id_tiket_bus" value="{{$data->id_tiket_bus}}" name="id_tiket_bus">
                    </div>
                    <div class="form-group">
                        <label for="id_jadwal_bus">Id Jadwal Bus</label>
                        <select name="id_jadwal_bus" id="id_jadwal_bus" class="custom-select">
                            @foreach ($jadwalbus as $item)
                            <option value="{{$item->id_jadwal_bus}}">{{ $item->id_jadwal_bus }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="harga">Harga</label>
                        <input type="text" class="form-control" id="harga" value="{{$data->harga}}" name="harga">
                    </div>
                    <div class="form-group">
                        <label for="tanggal_booking">Tanggal Booking</label>
                        <input type="date" class="form-control" id="tanggal_booking" value="{{$data->tanggal_booking}}" name="tanggal_booking">
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
