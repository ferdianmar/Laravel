@extends('layouts.base')


@section('container')
<div class="container-fluid">
  <div class="card-header">
    <br>
    <h3 class="card-title">Tabel Gaji</h3>

    <a href="/gaji/create" class="btn btn-sm btn-primary pull-right" style="margin-top: -8px">Tambah Data</a>
    <a href="/exportGaji" class="btn btn-sm btn-primary pull-right" style="margin-top: -8px">Excel</a>
    <a href="/cetakPdfGaji" target="_blank" class="btn btn-sm btn-primary pull-right" style="margin-top: -8px">PDF</a>
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
                <a href="/gaji/ambilupdate/{{$data->id}}" class="badge badge-danger"> Belum</a>
                @endif
              </td>
              <td>

                <form action="/gaji/delete/{{$data->id}}" method="post">
                  @method('delete')
                  @csrf
                  <a href="/gaji/edit/{{$data->id}}" class="btn btn-sm btn-success btn-inline">Edit</a>
                  <button class="btn btn-sm btn-danger pull-right btn-inline " onClick="confirm('Apakah anda yakin?')">Hapus</button>
                </form>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
@endsection