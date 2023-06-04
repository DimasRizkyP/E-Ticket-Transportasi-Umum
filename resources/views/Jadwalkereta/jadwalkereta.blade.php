@extends('dasbord.layout.app')

@section('judul','Data Jadwal Kereta')

@section('content')
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">@yield('judul')</h6>
    </div>
    <nav class="navbar navbar-light bg-light justify-content-between">
        <a class="navbar-brand"></a>
        <form class="form-inline">
            <form action="/Datajadwalkereta" method="GET">
                <input class="form-control mr-sm-2" type="search" name="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success my-1 my-sm-1" type="submit">Search</button>
                <div class="col-auto">
                    <a href="/exportpdfjadwalkereta" class="btn btn-success btn-rounded ">Cetak PDf</a>
                </div>
            </form>
        </form>
    </nav>
    <!-- <div class="card-body">

</div> -->
    <div class="card-body">
        <a href="{{route('Datajadwalkereta.tambah')}}" class="btn btn-primary mb-2">Tambah Data Jadwal Kereta</a>
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Id Jadwal Kereta</th>
                        <th>Nama Kereta</th>
                        <th>Id Rute Kereta</th>
                        <th>Tanggal berangkat</th>
                        <th>Tanggal sampai</th>
                        <th>Aksi</th>
                    </tr>
                </thead>

                <tbody>
                    @php($no = 1)
                    @foreach ($data as $row )

                    <tr>
                        <th>{{$no++}}</th>
                        <td>{{$row->id_jadwal_kereta}}</td>
                        <td>{{$row->namakereta->nama_kereta}}</td>
                        <td>{{$row->rutekereta->id_rute_kereta}}</td>
                        <td>{{$row->tanggal_berangkat}}</td>
                        <td>{{$row->tanggal_sampai}}</td>

                        <td>
                            <a href="{{route('Datajadwalkereta.edit',$row->id_jadwal_kereta)}}" class="btn btn-warning">Edit</a>
                            <a href="{{route('Datajadwalkereta.hapus',$row->id_jadwal_kereta)}}" class="btn btn-danger">Hapus</a>

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
