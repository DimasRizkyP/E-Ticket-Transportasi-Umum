@extends('dasbord.layout.app')

@section('judul','Data Rute Pesawat')

@section('content')
<form action="{{route('Datarutepesawat.update',$datarutepesawat->id_rute_pesawat)}}" method="post">
    @csrf
    <div class="row">
        <div class="col-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Tambah Data Rute Pesawat</h6>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="id_rute_pesawat">Id Rute Pesawat</label>
                        <input type="text" class="form-control" id="id_rute_pesawat" value="{{$datarutepesawat->id_rute_pesawat}}" name="id_rute_pesawat">
                    </div>
                    <div class="form-group">
                        <label for="id_bandara">Bandara Asal</label>
                        <select name="id_bandara_asal" id="id_bandara" class="custom-select">
                            @foreach ($rutepesawat as $item)
                            <option value="{{$item->id_bandara}}">{{ $item->nama_bandara }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Bandara Tujuan</label>
                        <!-- <input type="text" class="form-control" id="id_terminal_tujuan" name="id_terminal_tujuan"value="{{isset($data)? $data->id_terminal_tujuan: '' }}"> -->
                        <select name="id_bandara_tujuan" id="id_bandara" class="custom-select">
                            @foreach ($rutepesawat as $item)
                            <option value="{{$item->id_bandara}}">{{ $item->nama_bandara }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="detail_status">Detail Status</label>
                        <input type="text" class="form-control" id="detail_status" value="{{$datarutepesawat->detail_status}}" name="detail_status">
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
