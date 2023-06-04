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

    <h1>Data TIket Kereta</h1>

    <table id="customers">
        <tr>
            <th>No</th>
            <th>Id Tiket Kereta</th>
            <th>Id Jadwal Kereta</th>
            <th>Harga</th>
            <th>Tanggal Booking</th>
        </tr>
        @php
        $no=1;
        @endphp
        @foreach ($datatiketkereta as $row )
        <tr>
            <th>{{$no++}}</th>
            <td>{{$row->id_tiket_kereta}}</td>
            <td>{{$row->jadwalkereta->id_jadwal_kereta}}</td>
            <td>{{$row->harga}}</td>
            <td>{{$row->tanggal_booking}}</td>
        </tr>

        @endforeach
    </table>

</body>

</html>
