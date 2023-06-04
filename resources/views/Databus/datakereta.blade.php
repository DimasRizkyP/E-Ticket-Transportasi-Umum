@extends('dasbord.layout.app')

@section('judul','Data kereta')

@section('content')
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">@yield('judul')</h6>
    </div>
    <nav class="navbar navbar-light bg-light justify-content-between">
        <a class="navbar-brand"></a>
        <form class="form-inline">
        <form action="/Datakereta" method="GET">
            <input class="form-control mr-sm-2" type="search" name="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success my-1 my-sm-1" type="submit">Search</button>
            <div class="col-auto">
            <a href="/exportpdfkereta" class="btn btn-success btn-rounded ">Cetak PDf</a>
            </div>


            </form>
        </form>
        </form>
    </nav>
    <!-- <div class="card-body">

</div> -->
    <div class="card-body">
        <a href="{{route('Datakereta.tambah')}}" class="btn btn-primary mb-2">Tambah Data Kereta</a>
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Id kereta</th>
                        <th>Nama kereta</th>
                        <th>Kelas</th>
                        <th>Kuota kereta</th>
                        <th>Perusahaan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>

                <tbody>
                    @php($no = 1)
                    @foreach ($data as $row )
                    <tr>
                        <th>{{$no++}}</th>
                        <td>{{$row->id_kereta}}</td>
                        <td>{{$row->nama_kereta}}</td>
                        <td>{{$row->kelas}}</td>
                        <td>{{$row->kuota_kereta}}</td>
                        <td>{{$row->perusahaan}}</td>
                        <td>
                            <a href="{{route('Datakereta.edit',$row->id_kereta)}}" class="btn btn-warning">Edit</a>
                            <a href="{{route('Datakereta.hapus',$row->id_kereta)}}" class="btn btn-danger">Hapus</a>

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
