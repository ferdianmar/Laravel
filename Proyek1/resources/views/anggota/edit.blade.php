@extends('layouts.base')
@section('container')
<div class="container">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Data Karyawan</h1>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <form method="post" enctype="multipart/form-data" action="/anggota/update/{{$anggota->id}}">
            @csrf

            <div class="form-group row">
                <label for="kode" class="col-sm-2 col-form-label">Kode</label>
                <div class="col-sm-5">
                    <input type="text" class="col-sm-2 form-control" id="kode" value="{{$anggota->id}}" readonly>
                </div>
            </div>
            <div class="form-group row">
                <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control col-sm-6" name="nama" id="nama" value="{{$anggota->nama}}">
                </div>
            </div>
            <div class="form-group row">
                <label for="posisi" class="col-sm-2 col-form-label">Posisi</label>
                <div class="col-sm-10">
                    <select class="col-sm-6 form-control" name="posisi" id=posisi>
                        @foreach ($alpa as $key => $value)
                        <option value="{{ $key }}"> {{ $value }} </option>
                        @endforeach
                        </option>
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label for="jk" class="col-sm-2 col-form-label">Jenis Kelamin</label>
                <div class="col-sm-10">
                    <select class="col-sm-6 form-control" name="jenis_kelamin" id="jk">
                        <option value="{{$anggota->jenis_kelamin}}">{{$anggota->jenis_kelamin}}
                        <option value="Laki-Laki">Laki-Laki</option>
                        <option value="Perempuan">Perempuan</option>
                        </option>
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control col-sm-6" name="alamat" id="alamat" value="{{$anggota->alamat}}">
                </div>
            </div>
            <div class="form-group row">
                <label for="no_hp" class="col-sm-2 col-form-label">No Hp</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control  col-sm-6" name="no_hp" id="no_hp" value="{{$anggota->no_hp}}">
                </div>
            </div>

            <div class="form-group row">
                <label for="email" class="col-sm-2 col-form-label">Email</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control col-sm-6" name="email" id="email" value="{{$anggota->email}}">
                </div>
            </div>
            <div><button type="submit" class="btn btn-sm btn-primary">Simpan</button></div>
        </form>

    </section>
</div>
@endsection