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

    <h1>Data Pemesan</h1>

    <table id="customers">
        <tr>
            <th>No</th>
            <th>Id Pemesan</th>
            <th>Nama</th>
            <th>Tanggal</th>
            <th>Id Tiket Kereta</th>
            <th>Id Tiket Bus</th>
            <th>Id Tiket Pesawat</th>
        </tr>
        @php
        $no=1;
        @endphp
        @foreach ($datapemesan as $row )
        <tr>
            <th>{{$no++}}</th>
            <td>{{$row->id_pemesan}}</td>
            <td>{{$row->nama->nama}}</td>
            <td>{{$row->tanggal}}</td>
            <td>{{$row->tiketkereta->id_tiket_kereta ?? ''}}</td>
            <td>{{$row->tiketbus->id_tiket_bus ??''}}</td>
            <td>{{$row->tiketpesawat->id_tiket_pesawat ?? ''}}</td>


        </tr>

        @endforeach
    </table>

</body>

</html>
