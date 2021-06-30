@extends('layouts.admin')
@section('main-content')
<section class="content-header">
      <div class="container-fluid">
      @if(count($jabatan))
        <div class="alert alert-success" role="alert">
            <h4>Ditemukan {{ count($jabatan)}} data dengan kata : {{$cari}}</h4>
        </div>

        @if(Session::has('pesan'))
            <div class="alert alert-success" role="alert">
                {{Session::get('pesan')}}
            </div>
        @endif
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Data Jabatan</h1>
            <br>
            <form aling="right" action="{{ route('jabatan.search') }}" method="get">@csrf
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
                <h3 class="card-title">Tabel Jabatan</h3>

                <a href="{{ route('jabatan.create') }}" class="btn btn-sm btn-primary pull-right" style="margin-top: -8px">Tambah Data</a>
                <a href="{{ route('excel2') }}" class="btn btn-sm btn-primary pull-right" style="margin-top: -8px">Excel</a>
                <a href="{{ route('cetakPdfJabatan') }}" target="_blank" class="btn btn-sm btn-primary pull-right" style="margin-top: -8px">PDF</a>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <table class="table table-striped">
                  <thead>
                    <tr>
                      <th style="width: 10px">No</th>
                      <th>Nama Posisi</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php $no = $jabatan->firstItem() - 1 ; ?>
                  @foreach ($jabatan as $data)
                  <?php $no++ ;?>
                    <tr>
                      <td>{{ $no }}</td>
                      <td>{{ $data->nama_posisi }}</td>
                      <td><form action="{{ route('jabatan.destroy', $data->id) }}" method="post">@csrf
                        <a href="{{ route('jabatan.edit', $data->id) }}" class="btn btn-sm btn-success">Edit</a>
                        <button class="btn btn-sm btn-danger pull-right" 
                        onClick="Return confirm('Apakah anda yakin?')">Hapus</button>
                        </form>
                      </td>
                    </tr>
                    @endforeach
                    
                  </tbody>
                </table>
                <div>Jumlah Jabatan : {{ $jumlah_jabatan }}</div>
					      <div> {{ $jabatan->links() }} </div>
                <br>

                <a href="{{ route('jabatan') }}" class="btn btn-primary pull-right" style="margin-top: -8px">Kembali</a>
              </div>
              <!-- /.card-body -->
            </div>
            <div>
            @else
                <div class="alert alert-danger" role="alert">
                <h4>Data {{ $cari }} tidak ditemukan</h4>
                </div>
                <a href="{{ route('jabatan') }}" class="btn btn-primary pull-right" style="margin-top: -8px">Kembali</a>
                @endif
            </div>
            <!-- /.card -->
    </section>
@endsection