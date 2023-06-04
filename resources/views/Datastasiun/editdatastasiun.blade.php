@extends('dasbord.layout.app')

@section('judul','Data Stasiun')

@section('content')
<form action="{{route('Datastasiun.update',$datastasiun->id_stasiun)}}" method="post">
    @csrf
    <div class="row">
        <div class="col-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Edit Data Stasiun</h6>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="id_stasiun">Id Stasiun</label>
                        <input type="text" class="form-control" id="id_stasiun" value="{{$datastasiun->id_stasiun}}" name="id_stasiun">
                    </div>
                    <div class="form-group">
                        <label for="nama_stasiun">Nama Stasiun</label>
                        <input type="text" class="form-control" id="nama_stasiun" value="{{$datastasiun->nama_stasiun}}" name="nama_stasiun">
                    </div>
                    <div class="form-group">
                        <label for="kota">Kota</label>
                        <input type="text" class="form-control" id="kota" value="{{$datastasiun->kota}}" name="kota">
                    </div>
                    <div class="form-group">
                        <label for="negara">Negara</label>
                        <input type="text" class="form-control" id="negara" value="{{$datastasiun->negara}}" name="negara">
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
