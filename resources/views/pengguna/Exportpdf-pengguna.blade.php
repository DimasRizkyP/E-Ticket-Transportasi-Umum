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

    <h1>Data Pengguna</h1>

    <table id="customers">
        <tr>
            <th>No</th>
            <th>Id Pengguna</th>
            <th>Nama</th>
            <th>No Ktp</th>
            <th>Warga Negara</th>
        </tr>
        @php
        $no=1;
        @endphp
        @foreach ($datapengguna as $row )
        <tr>
            <th>{{$no++}}</th>
            <td>{{$row->id_pengguna}}</td>
            <td>{{$row->nama}}</td>
            <td>{{$row->no_ktp}}</td>
            <td>{{$row->warga_negara}}</td>
        </tr>

        @endforeach
    </table>

</body>

</html>
