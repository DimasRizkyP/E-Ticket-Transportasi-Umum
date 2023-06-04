@extends('dasbord.layout.app')

@section('judul','Data Rute Pesawat')

@section('content')
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">@yield('judul')</h6>
    </div>
    <nav class="navbar navbar-light bg-light justify-content-between">
        <a class="navbar-brand"></a>
        <form class="form-inline">
        <form action="/Datarutepesawat" method="GET">
            <input class="form-control mr-sm-2" type="search" name="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success my-1 my-sm-1" type="submit">Search</button>
            <div class="col-auto">
            <a href="/exportpdfrutepesawat" class="btn btn-success btn-rounded ">Cetak PDf</a>
            </div>
            </form>
        </form>
    </nav>
    <!-- <div class="card-body">

</div> -->
    <div class="card-body">
        <a href="{{route('Datarutepesawat.tambah')}}" class="btn btn-primary mb-2">Tambah Data Rute Pesawat</a>
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Id Rute Pesawat</th>
                        <th>Bandara Asal</th>
                        <th>Bandara Tujuan</th>
                        <th>Detail Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>

                <tbody>
                    @php($no = 1)
                    @foreach ($data as $row )

                    <tr>
                        <th>{{$no++}}</th>
                        <td>{{$row->id_rute_pesawat}}</td>
                        <td>{{$row->bandara_asal->nama_bandara}}</td>
                        <td>{{$row->bandara_tujuan->nama_bandara}}</td>
                        <td>{{$row->detail_status}}</td>

                        <td>
                            <a href="{{route('Datarutepesawat.edit',$row->id_rute_pesawat)}}" class="btn btn-warning">Edit</a>
                            <a href="{{route('Datarutepesawat.hapus',$row->id_rute_pesawat)}}" class="btn btn-danger">Hapus</a>

                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $data->links('pagination::bootstrap-5') }}
        </div>
        @include('sweetalert::alert')
    </div>
</div>


@endsection
