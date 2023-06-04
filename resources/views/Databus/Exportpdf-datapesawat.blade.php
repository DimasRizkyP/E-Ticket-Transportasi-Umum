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

    <h1>Data Pesawat</h1>

    <table id="customers">
        <tr>
            <th>No</th>
            <th>Id Pesawat</th>
            <th>Nama Pesawat</th>
            <th>Kelas</th>
            <th>kuota</th>
            <th>Perusahaan</th>
        </tr>
        @php
        $no=1;
        @endphp
        @foreach ($datapesawat as $row )
        <tr>
            <th>{{$no++}}</th>
            <td>{{$row->id_pesawat}}</td>
            <td>{{$row->nama_pesawat}}</td>
            <td>{{$row->kelas}}</td>
            <td>{{$row->kuota}}</td>
            <td>{{$row->perusahaan}}</td>
        </tr>

        @endforeach


    </table>

</body>

</html>
