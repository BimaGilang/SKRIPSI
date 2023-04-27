<!DOCTYPE html>
<html lang="en">

<head>
    <!-- <link rel="stylesheet" href="{{ asset('/AdminLTE-3.2.0/bower_components/bootstrap/dist/css/bootstrap.min.css') }}"> -->
    <link rel="stylesheet" href="{{ asset('/') }}dist/css/bootstrap.min.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laporan Pendapatan</title>

    <style>
        .text-center {
            text-align: center;
        }
    </style>
</head>

<body>
    <h3 class="text-center">Laporan Pendapatan</h3>
    <h4 class="text-center">
        Tanggal {{ tanggal_indonesia($awal, false) }}
        s/d
        Tanggal {{ tanggal_indonesia($akhir, false) }}
    </h4>

    <table class="table table-bordered" style="margin-left: 150px;">
        <thead>
            <tr>
                <th width="5%">No</th>
                <th>Tanggal</th>
                <th>Penjualan</th>
                <th>Pengeluaran</th>
                <th>Pendapatan</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $row)
            <tr>
                @foreach ($row as $col)
                <td>{{ $col }}</td>
                @endforeach
            </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>