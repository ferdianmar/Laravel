@extends('layouts.base')
@section('container')
<div class="container">
<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Data Jabatan</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
    <form method="post" enctype="multipart/form-data" action="/jabatan/update/{{$jabatan->id}}">
        @csrf

            <div class="form-group row">
                <label for="kode" class="col-sm-2 col-form-label">Kode</label>
                <div class="col-sm-6">
                <input type="text" class="col-sm-2 form-control" name="kode" id="kode" value="{{$jabatan->id}}" readonly>
                </div>
            </div>
            <div class="form-group row">
            <label for="nama_posisi" class="col-sm-2 col-form-label">Nama</label>
                <div class="col-sm-10">
                <input type="text" class="form-control col-sm-4" name="nama_posisi" id="nama_posisi" value="{{$jabatan->nama_posisi}}">
                </div>
            </div>
            
            <div><button type="submit" class="btn btn-sm btn-primary">Simpan</button></div>
        </form>

    </section>
</div>
@endsection

