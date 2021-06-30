@extends('layouts.admin')
@section('main-content')
<section class="content-header">
      <div class="container-fluid">
      @if(count($gaji))
        <div class="alert alert-success" role="alert">
            <h4>Ditemukan {{ count($gaji)}} data dengan kata : {{$cari}}</h4>
        </div>

        @if(Session::has('pesan'))
            <div class="alert alert-success" role="alert">
                {{Session::get('pesan')}}
            </div>
        @endif
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Data Gaji</h1>
            <br>
            <form aling="right" action="{{ route('gaji.search') }}" method="get">@csrf
            <input type="text" name="kata" placeholder="Search">
            </form>
            <br>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card">
              <div class="card-header">
              <br>
                <h3 class="card-title">Tabel Gaji</h3>

                <a href="{{ route('gaji.create') }}" class="btn btn-sm btn-primary pull-right" style="margin-top: -8px">Tambah Data</a>
                <a href="{{ route('excel3') }}" class="btn btn-sm btn-primary pull-right" style="margin-top: -8px">Excel</a>
                <a href="{{ route('cetakPdfGaji') }}" target="_blank" class="btn btn-sm btn-primary pull-right" style="margin-top: -8px">PDF</a>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <table class="table table-striped">
                <thead>
                    <tr>
                      <th style="width: 10px">No</th>
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
                  <tbody>
                  <?php $no = $gaji->firstItem() - 1 ; ?>
                  @foreach ($gaji as $data)
                  <?php $no++ ;?>
                    <tr>
                      <td>{{ $no }}</td>
                      <td>{{ $data->nama }}</td>
                      <td>{{ $data->posisi }}</td>
                      <td>{{ $data->gaji }}</td>
                      <td>{{ $data->lembur }}</td>
                      <td>{{ $data->tanggal }}</td>
                      <td>{{ $data->keterangan }}</td> 

                      <td><form action="{{ route('gaji.destroy', $data->id) }}" method="post">@csrf
                        <a href="{{ route('gaji.edit', $data->id) }}" class="btn btn-sm btn-success">Edit</a>
                        <button class="btn btn-sm btn-danger pull-right" 
                        onClick="Return confirm('Apakah anda yakin?')">Hapus</button>
                        </form>
                      </td>
                    </tr>
                    @endforeach
                    
                  </tbody>
                </table>
                <div>Jumlah Gaji : {{ $jumlah_gaji }}</div>
					      <div> {{ $gaji->links() }} </div>
                <br>

                <a href="{{ route('gaji') }}" class="btn btn-primary pull-right" style="margin-top: -8px">Kembali</a>
              </div>
              <!-- /.card-body -->
            </div>
            <div>
            @else
                <div class="alert alert-danger" role="alert">
                <h4>Data {{ $cari }} tidak ditemukan</h4>
                </div>
                <a href="{{ route('gaji') }}" class="btn btn-primary pull-right" style="margin-top: -8px">Kembali</a>
                @endif
            </div>
            <!-- /.card -->
    </section>
@endsection