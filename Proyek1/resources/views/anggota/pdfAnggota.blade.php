<!DOCTYPE html>
<head>
    <title>Cetak PDF Data Karyawan</title>
</head>
<body>
    <style type="text/css">
        body{
            font-family: sans-serif;
        }
        table{
            margin: 20px auto;
            border-collapse: collapse;
        }
        table th,
        table td{
            border: 1px solid #3c3c3c;
            padding: 3px 8px;
        }
        a{
            padding: 8px 10px;
            text-decoration: none;
            border-radius: 2px;
        }
        .tengah{
            text-align: center;
        }
    </style>
    <h2 align="center">Cetak Data Karyawan</h2>
    <table>
        <thead>
            <tr>
                <th style="width: 10%">Kode</th>
                <th style="width: 16.66%">Nama</th>
                <th style="width: 16.66%">Posisi</th>
                <th style="width: 10%">Jenis Kelamin</th>
                <th style="width: 12%">Alamat</th>
                <th style="width: 14%">No Hp</th>
                <th style="width: 15%">Email</th>
            </tr>
        </thead>
        <tbody>
        @foreach ($anggota as $data)
            <tr>
                <td>{{ $data->id }}</td>
                <td>{{ $data->nama }}</td>
                <td>{{ $data->posisi }}</td>
                <td>{{ $data->jenis_kelamin }}</td>
                <td>{{ $data->alamat }}</td>
                <td>{{ $data->no_hp }}</td>
                <td>{{ $data->email }}</td>
                
            </tr>
            @endforeach
        </tbody>
    </table>
    <script type="text/javascript">
        window.print();
    </script>
</body>
</html>