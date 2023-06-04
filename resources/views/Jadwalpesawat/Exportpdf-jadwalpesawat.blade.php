<!DOCTYPE html>
<html>

<head>
    <style>
        #customers {
            font-family: Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        #customers td,
        #customers th {
            border: 1px solid #ddd;
            padding: 8px;
        }

        #customers tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        #customers tr:hover {
            background-color: #ddd;
        }

        #customers th {
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: left;
            background-color: #04AA6D;
            color: white;
        }
    </style>
</head>

<body>

    <h1>Data Jadwal Pesawat</h1>

    <table id="customers">
        <tr>
            <th>No</th>
            <th>Id Jadwal Pesawat</th>
            <th>Nama Pesawat</th>
            <th>Id Rute Pesawat</th>
            <th>Tanggal berangkat</th>
            <th>Tanggal sampai</th>
        </tr>
        @php
        $no=1;
        @endphp
        @foreach ($datajadwalpesawat as $row )
        <tr>
            <th>{{$no++}}</th>
            <th>{{$no++}}</th>
            <td>{{$row->id_jadwal_pesawat}}</td>
            <td>{{$row->namapesawat->nama_pesawat}}</td>
            <td>{{$row->rutepesawat->id_rute_pesawat}}</td>
            <td>{{$row->tanggal_berangkat}}</td>
            <td>{{$row->tanggal_sampai}}</td>
        </tr>

        @endforeach
    </table>

</body>

</html>