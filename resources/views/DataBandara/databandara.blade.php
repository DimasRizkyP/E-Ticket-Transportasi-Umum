@extends('dasbord.layout.app')

@section('judul','Data Bandara')

@section('content')
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">@yield('judul')</h6>
    </div>
    <nav class="navbar navbar-light bg-light justify-content-between">
        <a class="navbar-brand"></a>
        <form class="form-inline">
        <form action="/Databandara" method="GET">
            <input class="form-control mr-sm-2" type="search" name="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success my-1 my-sm-1" type="submit">Search</button>
            <div class="col-auto">
            <a href="/exportpdfbandara" class="btn btn-success btn-rounded ">Cetak PDf</a>
            </div>


            </form>
        </form>
    </nav>
    <!-- <div class="card-body">

</div> -->
    <div class="card-body">
        <a href="{{route('Databandara.tambah')}}" class="btn btn-primary mb-2">Tambah Data Bandara</a>
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Id Bandara</th>
                        <th>Nama Bandara</th>
                        <th>Kota</th>
                        <th>Negara</th>
                        <th>Aksi</th>
                    </tr>
                </thead>

                <tbody>
                    @php($no = 1)
                    @foreach ($data as $row )

                    <tr>
                        <th>{{$no++}}</th>
                        <td>{{$row->id_bandara}}</td>
                        <td>{{$row->nama_bandara}}</td>
                        <td>{{$row->kota}}</td>
                        <td>{{$row->negara}}</td>
                        <td>
                            <a href="{{route('Databandara.edit',$row->id_bandara)}}" class="btn btn-warning">Edit</a>
                            <a href="{{route('Databandara.hapus',$row->id_bandara)}}" class="btn btn-danger">Hapus</a>

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
