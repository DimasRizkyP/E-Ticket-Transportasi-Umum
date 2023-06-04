@extends('dasbord.layout.app')

@section('judul','Data Pesawat')

@section('content')
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">@yield('judul')</h6>
    </div>
    <nav class="navbar navbar-light bg-light justify-content-between">
        <a class="navbar-brand"></a>
        <form class="form-inline">
        <form action="/Datapesawat" method="GET">
            <input class="form-control mr-sm-2" type="search" name="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success my-1 my-sm-1" type="submit">Search</button>
            <div class="col-auto">
            <a href="/exportpdfpesawat" class="btn btn-success btn-rounded ">Cetak PDf</a>
            </div>


            </form>
        </form>
    </nav>
    <!-- <div class="card-body">

</div> -->
    <div class="card-body">
        <a href="{{route('Datapesawat.tambah')}}" class="btn btn-primary mb-2">Tambah Data Pesawat</a>
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Id Pesawat</th>
                        <th>Nama Pesawat</th>
                        <th>Kelas</th>
                        <th>Kuota</th>
                        <th>Perusahaan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>

                <tbody>
                    @php($no = 1)
                    @foreach ($data as $row )
                    <tr>
                        <th>{{$no++}}</th>
                        <td>{{$row->id_pesawat}}</td>
                        <td>{{$row->nama_pesawat}}</td>
                        <td>{{$row->kelas}}</td>
                        <td>{{$row->kuota}}</td>
                        <td>{{$row->perusahaan}}</td>
                        <td>
                            <a href="{{route('Datapesawat.edit',$row->id_pesawat)}}" class="btn btn-warning">Edit</a>
                            <a href="{{route('Datapesawat.hapus',$row->id_pesawat)}}" class="btn btn-danger">Hapus</a>

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
