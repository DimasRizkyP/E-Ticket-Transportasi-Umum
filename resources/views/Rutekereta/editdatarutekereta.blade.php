@extends('dasbord.layout.app')

@section('judul','Data Rute Kereta')

@section('content')
<form action="{{route('Datarutekereta.update',$datarutekereta->id_rute_kereta)}}" method="post">
    @csrf
    <div class="row">
        <div class="col-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Tambah Data Rute Kereta</h6>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="id_rute_kereta">Id Rute Kereta</label>
                        <input type="text" class="form-control" id="id_rute_kereta" value="{{$datarutekereta->id_rute_kereta}}" name="id_rute_kereta">
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
                        <select name="id_bandara_tujuan" id="id_bandara" class="custom-select">
                            @foreach ($rutepesawat as $item)
                            <option value="{{$item->id_bandara}}">{{ $item->nama_bandara }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="detail_status">Detail Status</label>
                        <input type="text" class="form-control" id="detail_status" value="{{$datarutekereta->detail_status}}" name="detail_status">
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
