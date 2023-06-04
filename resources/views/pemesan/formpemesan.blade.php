@extends('dasbord.layout.app')

@section('judul','Data Pemesan')

@section('content')
<form action="{{isset($data) ? route ('Datapemesan.tambah.update',$data->id_pemesan) : route('Datapemesan.tambah.simpan')}}" method="post">
    @csrf
    <div class="row">
        <div class="col-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Tambah Data Pemesan</h6>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="id_pemesan">Id Pemesan</label>
                        <input type="text" class="form-control" id="id_pemesan" name="id_pemesan" value="{{isset($data)? $data->id_pemesan: '' }}">
                    </div>
                    <div class="form-group">
                        <label for="id_pengguna">Nama</label>
                        <select name="id_pengguna_nama" id="id_pengguna" class="custom-select">

                            @foreach ($nama as $item)
                            <option value="{{$item->id_pengguna}}">{{ $item->nama }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="tanggal">Tanggal</label>
                        <input type="date" class="form-control" id="tanggal" name="tanggal"value="{{isset($data)? $data->tanggal : '' }}">
                    </div>
                    <div class="form-group">
                        <label for="id_tiket_kereta">ID Tiket Kereta</label>
                        <select name="id_tiket_kereta" id="id_tiket_kereta" class="custom-select">
                        <option value="">- Pilih -</option>
                            @foreach ($tiketkereta as $item)
                            <option value="{{$item->id_tiket_kereta}}">{{ $item->id_tiket_kereta }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="id_tiket_bus">ID Tiket Bus</label>
                        <select name="id_tiket_bus" id="id_tiket_bus" class="custom-select">
                            <option value="">- Pilih -</option>
                            @foreach ($tiketbus as $item)
                            <option value="{{$item->id_tiket_bus}}">{{ $item->id_tiket_bus }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="id_tiket_pesawat">ID Tiket Pesawat</label>
                        <select name="id_tiket_pesawat" id="id_tiket_pesawat" class="custom-select">
                        <option value="">- Pilih -</option>
                            @foreach ($tiketpesawat as $item)
                            <option value="{{$item->id_tiket_pesawat}}">{{ $item->id_tiket_pesawat }}</option>
                            @endforeach
                        </select>
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
