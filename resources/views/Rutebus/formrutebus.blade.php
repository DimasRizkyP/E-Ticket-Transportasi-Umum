@extends('dasbord.layout.app')

@section('judul','Data Rute Bus')

@section('content')
<form action="{{isset($data) ? route ('Datarutebus.tambah.update',$data->id_rute_bus) : route('Datarutebus.tambah.simpan')}}" method="post">
    @csrf
    <div class="row">
        <div class="col-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Tambah Data Rute Bus</h6>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="id_rute_bus">Id Rute Bus</label>
                        <input type="text" class="form-control" id="id_rute_bus" name="id_rute_bus" value="{{isset($data)? $data->id_rute_bus : '' }}">
                    </div>
                    <div class="form-group">
                        <label for="id_terminal">Terminal Asal</label>
                        <select name="id_terminal_asal" id="id_terminal" class="custom-select">
                        <option value="">- Pilih -</option>
                          @foreach ($bus1 as $item)
                            <option value="{{$item->id_terminal}}">{{ $item->nama_terminal }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Terminal Tujuan</label>
                        <select name="id_terminal_tujuan" id="id_terminal" class="custom-select">
                        <option value="">- Pilih -</option>
                            @foreach ($bus1 as $item)
                            <option value="{{$item->id_terminal}}">{{ $item->nama_terminal }}</option>
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
