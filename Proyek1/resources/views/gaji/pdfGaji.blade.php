<!DOCTYPE html>
<head>
    <title>Cetak PDF Data Gaji</title>
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
    <h2 align="center">Cetak Data Gaji</h2>
    <table>
        <thead>
            <tr>
                <th style="width: 10%">Kode</th>
                <th style="width: 16.66%">Nama</th>
                <th style="width: 16.66%">Posisi</th>
                <th style="width: 16.66%">Gaji</th>
                <th style="width: 16.66%">Lembur</th>
                <th style="width: 16.66%">Total Gaji</th>
                <th style="width: 16.66%">Tanggal</th>
                <th style="width: 16.66%">Keterangan</th>
            </tr>
        </thead>
        <tbody>
        @foreach ($gaji as $data)
            <tr>
                <td>{{ $data->id }}</td>
                <td>{{ $data->nama }}</td>
                <td>{{ $data->posisi }}</td>
                <td>{{ $data->gaji }}</td>
                <td>{{ $data->lembur }}</td>
                <td>{{ $data->total_gaji }}</td>
                <td>{{ $data->tanggal }}</td>
                <td>{{ $data->keterangan }}</td>
                
                
            </tr>
            @endforeach
        </tbody>
    </table>
    <script type="text/javascript">
        window.print();
    </script>
</body>
</html>