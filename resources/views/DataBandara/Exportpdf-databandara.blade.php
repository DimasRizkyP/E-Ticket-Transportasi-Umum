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

    <h1>Data Bandara</h1>

    <table id="customers">
        <tr>
            <th>No</th>
            <th>Id Bandara</th>
            <th>Nama Bandara</th>
            <th>Kota</th>
            <th>Negara</th>
        </tr>
        @php
        $no=1;
        @endphp
        @foreach ($databandara as $row )
        <tr>
            <th>{{$no++}}</th>
            <td>{{$row->id_bandara}}</td>
            <td>{{$row->nama_bandara}}</td>
            <td>{{$row->kota}}</td>
            <td>{{$row->negara}}</td>
        </tr>

        @endforeach


    </table>

</body>

</html>
