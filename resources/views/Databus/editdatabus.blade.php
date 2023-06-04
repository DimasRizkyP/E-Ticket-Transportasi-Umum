@extends('dasbord.layout.app')

@section('judul','Data Bus')

@section('content')
<form action="{{route('Databus.update',$databus->id_bus)}}" method="post">
    @csrf
    <div class="row">
        <div class="col-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Tambah Data Bus</h6>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="id_bus">Id Bus</label>
                        <input type="text" class="form-control" id="id_bus" value="{{$databus->id_bus}}" name="id_bus">
                    </div>
                    <div class="form-group">
                        <label for="nama_bus">Nama Bus</label>
                        <input type="text" class="form-control" id="nama_bus" value="{{$databus->nama_bus}}" name="nama_bus">
                    </div>
                    <div class="form-group">
                        <label for="kelas">Kelas</label>
                        <input type="text" class="form-control" id="kelas" value="{{$databus->kelas}}" name="kelas">
                    </div>
                    <div class="form-group">
                        <label for="kuota">Kuota</label>
                        <input type="text" class="form-control" id="kuota" value="{{$databus->kuota}}" name="kuota">
                    </div>
                    <div class="form-group">
                        <label for="perusahaan">Perusahaan</label>
                        <input type="text" class="form-control" id="perusahaan" value="{{$databus->perusahaan}}" name="perusahaan">
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
