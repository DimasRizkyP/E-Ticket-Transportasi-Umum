@extends('dasbord.layout.app')

@section('judul','Data bus')

@section('content')
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">@yield('judul')</h6>
    </div>
    <nav class="navbar navbar-light bg-light justify-content-between">
        <a class="navbar-brand"></a>
        <form class="form-inline">
        <form action="/Databus" method="GET">
            <input class="form-control mr-sm-2" type="search" name="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success my-1 my-sm-1" type="submit">Search</button>
            <div class="col-auto">
            <a href="/exportpdfbus" class="btn btn-success btn-rounded ">Cetak PDf</a>
            </div>


            </form>
        </form>
    </nav>
    <!-- <div class="card-body">

</div> -->
    <div class="card-body">
        <a href="{{route('Databus.tambah')}}" class="btn btn-primary mb-2">Tambah Data Bus</a>
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Id Bus</th>
                        <th>Nama Bus</th>
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
                        <td>{{$row->id_bus}}</td>
                        <td>{{$row->nama_bus}}</td>
                        <td>{{$row->kelas}}</td>
                        <td>{{$row->kuota}}</td>
                        <td>{{$row->perusahaan}}</td>
                        <td>
                            <a href="{{route('Databus.edit',$row->id_bus)}}" class="btn btn-warning">Edit</a>
                            <a href="{{route('Databus.hapus',$row->id_bus)}}" class="btn btn-danger">Hapus</a>

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
