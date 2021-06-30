@extends('layouts.base')
@section('container')
<div class="container-fluid">
<div class="card-header">
        <br>
        @if (session('status'))
        <span class="aler alert-success">{{session('status')}}</span>
        @endif
        <h3 class="card-title">Tabel Karyawan</h3>
    </div>
  <!-- /.card-header -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary text-center">DATA KARYAWAN</h6>
    </div>
    <div class="card-body shadow-lg">
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead class="bg-dark text-center text-light">
            <tr>
            
              <th spcope="col">No</th>
              <th>Nama</th>
              <th>Posisi</th>
              <th>Gaji</th>
              <th>Lembur</th>
              <th>Total Gaji</th>
              <th>Tanggal</th>
              <th>Keterangan</th>
              <th>Aksi</th>
            </tr>
          </thead>

          <tbody class=" text-center">
            @foreach ($gaji as $data)
            @if(auth()->user()->name == $data->anggota->nama)
            <tr>
              <td scope="row">{{ $loop->iteration }}</td>
              <td>{{ $data->anggota->nama }}</td>
              <td>{{ $data->jabatan->nama_posisi }}</td>
              <td>Rp.{{ $data->gaji }}</td>
              <td>Rp.{{ $data->lembur }}</td>
              <td>Rp.{{ $data->total_gaji }}</td>
              <td>{{ $data->tanggal }}</td>
              <td>
                @if ($data->keterangan == "Lunas")
                <span class="badge badge-success"> Lunas</span>
                @else
                <span class="badge badge-danger"> Belum</span>
                </td>
                <td>
                <a href="/gajis/cetak/{{$data->id}}" target="blank" class="btn btn-warning"> Ambil Gaji </a>
                </td>
                @endif
            </tr>
            @endif
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
@endsection