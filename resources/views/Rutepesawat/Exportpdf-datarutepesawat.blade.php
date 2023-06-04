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

    <h1>Data Rute Pesawat</h1>

    <table id="customers">
        <tr>
            <th>No</th>
            <th>Id Rute Pesawat</th>
            <th>Terminal Asal</th>
            <th>Terminal Tujuan</th>
            <th>Detail Status</th>
        </tr>
        @php
        $no=1;
        @endphp
        @foreach ($datarutepesawat as $row )
        <tr>
            <th>{{$no++}}</th>
            <td>{{$row->id_rute_pesawat}}</td>
            <td>{{$row->bandara_asal->nama_bandara}}</td>
            <td>{{$row->bandara_tujuan->nama_bandara}}</td>
            <td>{{$row->detail_status}}</td>
        </tr>

        @endforeach
    </table>

</body>

</html>
