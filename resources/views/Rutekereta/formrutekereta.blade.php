@extends('dasbord.layout.app')

@section('judul','Data Rute Bus')

@section('content')
<form action="{{isset($data) ? route ('Datarutekereta.tambah.update',$data->id_rute_kereta) : route('Datarutekereta.tambah.simpan')}}" method="post">
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
                        <input type="text" class="form-control" id="id_rute_kereta" name="id_rute_kereta" value="{{isset($data)? $data->id_rute_kereta : '' }}">
                    </div>
                    <div class="form-group">
                        <label for="id_stasiun">Stasiun Asal</label>
                        <select name="id_stasiun_asal" id="id_stasiun" class="custom-select">
                        <option value="">- Pilih -</option>
                            @foreach ($rutekereta as $item)
                            <option value="{{$item->id_stasiun}}">{{ $item->nama_stasiun }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Stasiun Tujuan</label>
                        <select name="id_stasiun_tujuan" id="id_staisun" class="custom-select">
                        <option value="">- Pilih -</option>
                            @foreach ($rutekereta as $item)
                            <option value="{{$item->id_stasiun}}">{{ $item->nama_stasiun }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="detail_status">Detail Status</label>
                        <input type="text" class="form-control" id="detail_status" name="detail_status"value="{{isset($data)? $data->detail_status : '' }}">
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
