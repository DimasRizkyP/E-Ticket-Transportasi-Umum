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

    <h1>Data Rute Bus</h1>

    <table id="customers">
        <tr>
            <th>No</th>
            <th>Id Rute Bus</th>
            <th>Terminal Asal</th>
            <th>Terminal Tujuan</th>
            <th>Detail Status</th>
        </tr>
        @php
        $no=1;
        @endphp
        @foreach ($datarutebus as $row )
        <tr>
            <th>{{$no++}}</th>
            <td>{{$row->id_rute_bus}}</td>
            <td>{{$row->terminal_asal->nama_terminal}}</td>
            <td>{{$row->terminal_tujuan->nama_terminal}}</td>
            <td>{{$row->detail_status}}</td>
        </tr>

        @endforeach
    </table>

</body>

</html>