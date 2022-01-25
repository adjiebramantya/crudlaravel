<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cetak Data Pegawai</title>
    <style>
        table.static{
            position: relative;
            border: 1px solid #543535;
        }
    </style>
</head>
<body>
    <div class="form-group">
        <p align="center"><b>Laporan Data Pegawai</b></p>
        <table class="static" align="center" rules="all" border="1px" style="width: 95%">
            <tr>
                <th>No.</th>
                <th>Nama Pegawai</th>
                <th>Jabatan</th>
                <th>Tanggal Lahir</th>
                <th>Alamat</th>
            </tr>           
                @foreach ($data as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->nama }}</td>
                    <td>{{ $item->jabatan->jabatan }}</td>
                    <td>{{ $item->tanggal_lahir }}</td>
                    <td>{{ $item->alamat }}</td>
                </tr>
                @endforeach
        </table>
    </div>

    <script type="text/javascript">
        window.print();
    </script>
</body>
</html>