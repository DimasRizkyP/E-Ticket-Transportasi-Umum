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

    <h1>Data Rute Kereta</h1>

    <table id="customers">
        <tr>
            <th>No</th>
            <th>Id Rute Kereta</th>
            <th>Stasiun Asal</th>
            <th>Stasiun Tujuan</th>
            <th>Detail Status</th>
        </tr>
        @php
        $no=1;
        @endphp
        @foreach ($datarutekereta as $row )
        <tr>
            <th>{{$no++}}</th>
            <td>{{$row->id_rute_kereta}}</td>
            <td>{{$row->stasiun_asal->nama_stasiun}}</td>
            <td>{{$row->stasiun_tujuan->nama_stasiun}}</td>
            <td>{{$row->detail_status}}</td>    
        </tr>

        @endforeach
    </table>

</body>

</html>
