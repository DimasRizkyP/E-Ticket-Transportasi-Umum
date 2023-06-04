@extends('dasbord.layout.app')

@section('judul','Data Bandara')

@section('content')
<form action="{{route('Databandara.update',$databandara->id_bandara)}}" method="post">
    @csrf
    <div class="row">
        <div class="col-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Edit  Data Bandara</h6>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="id_bandara">Id Bandara</label>
                        <input type="text" class="form-control" id="id_bandara" value="{{$databandara->id_bandara}}" name="id_bandara">
                    </div>
                    <div class="form-group">
                        <label for="nama_bandara">Nama Bandara</label>
                        <input type="text" class="form-control" id="nama_bandara" value="{{$databandara->nama_bandara}}" name="nama_bandara">
                    </div>
                    <div class="form-group">
                        <label for="kota">Kota</label>
                        <input type="text" class="form-control" id="kota" value="{{$databandara->kota}}" name="kota">
                    </div>
                    <div class="form-group">
                        <label for="negara">Negara</label>
                        <input type="text" class="form-control" id="negara" value="{{$databandara->negara}}" name="negara">
                    </div>

                </div>
                <div class="card-footer">
                    <button type="sumbit" class="btn btn-primary">Simpan</button>
                </div>
            </div>
        </div>
        @include('sweetalert::alert')
    </div>
</form>


@endsection
