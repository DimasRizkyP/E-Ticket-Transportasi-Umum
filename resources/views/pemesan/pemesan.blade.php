@extends('dasbord.layout.app')

@section('judul','Data Pemesan')

@section('content')
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">@yield('judul')</h6>
    </div>
    <nav class="navbar navbar-light bg-light justify-content-between">
        <a class="navbar-brand"></a>
        <form class="form-inline">
        <form action="/Datapemesan" method="GET">
            <input class="form-control mr-sm-2" type="search" name="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success my-1 my-sm-1" type="submit">Search</button>
            <div class="col-auto">
            <a href="/exportpdfpemesan" class="btn btn-success btn-rounded ">Cetak PDf</a>
            </div>
            </form>
        </form>
    </nav>
    <!-- <div class="card-body">

</div> -->
    <div class="card-body">
        <a href="{{route('Datapemesan.tambah')}}" class="btn btn-primary mb-2">Tambah Data Pemesan</a>
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Id Pemesan</th>
                        <th>Nama</th>
                        <th>Tanggal</th>
                        <th>Id Tiket Kereta</th>
                        <th>Id Tiket Bus</th>
                        <th>Id Tiket Pesawat</th>
                        <th>Aksi</th>
                    </tr>
                </thead>

                <tbody>
                    @php($no = 1)
                    @foreach ($data as $row )

                    <tr>
                        <th>{{$no++}}</th>
                        <td>{{$row->id_pemesan}}</td>
                        <td>{{$row->nama->nama}}</td>
                        <td>{{$row->tanggal}}</td>
                        <td>{{$row->tiketkereta->id_tiket_kereta ?? ''}}</td>
                        <td>{{$row->tiketbus->id_tiket_bus ?? ''}}</td>
                        <td>{{$row->tiketpesawat->id_tiket_pesawat ?? ''}}</td>



                        <td>
                            <a href="{{route('Datapemesan.edit',$row->id_pemesan)}}" class="btn btn-warning">Edit</a>
                            <a href="{{route('Datapemesan.hapus',$row->id_pemesan)}}" class="btn btn-danger">Hapus</a>

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
