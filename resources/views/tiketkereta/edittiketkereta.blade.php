@extends('dasbord.layout.app')

@section('judul','Data Tiket Kereta')

@section('content')
<form action="{{route('Datatikereta.update',$datatiketkereta->id_tiket_kereta)}}" method="post">
    @csrf
    <div class="row">
        <div class="col-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Tambah Data Tiket Kereta</h6>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="id_tiket_kereta">Id Tiket Kereta</label>
                        <input type="text" class="form-control" id="id_tiket_pesawat" value="{{$data->id_tiket_kereta}}" name="id_tiket_kereta">
                    </div>
                    <div class="form-group">
                        <label for="id_jadwal_kereta">Id Jadwal Kereta</label>
                        <select name="id_jadwal_kereta" id="id_jadwal_kereta" class="custom-select">
                            @foreach ($jadwalkeretaas $item)
                            <option value="{{$item->id_jadwal_kereta}}">{{ $item->id_jadwal_kereta }}</option>
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
