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
        <form method="post" enctype="multipart/form-data" action="/anggota/store">
            @csrf
            <div class="container">
                <div class="form-group row">
                    <label for="kode" class="col-sm-2 col-form-label">Id Karyawan</label>
                    <div class="col-sm-10">
                        <input type="text" class="col-sm-2 form-control" name="kode" id="kode" disabled value="{{mt_rand(1,999)}}">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control col-sm-12" name="nama" id="nama" placeholder=" Masukan Nama Karyawan .." value="{{old('nama')}}">
                        @error('nama')
                        <span class="text-danger"> {{ $message }} </span>
                        @enderror
                    </div>

                </div>
                <div class="form-group row">
                    <label for="nama" class="col-sm-2 col-form-label">Posisi</label>
                    <div class="col-sm-5">
                        <select id="inputState" class="form-control" name="posisi">
                            @foreach ($alpa as $key => $value)
                            <option value="{{ $key }}"> {{ $value }} </option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="jk" class="col-sm-2 col-form-label">Jenis Kelamin</label>
                    <div class="col-sm-5">
                        <select class="col-sm2 form-control" name="jenis_kelamin" id="jk">
                            <option value="">Pilih Jenis Kelamin !</option>
                            <option value="Laki-Laki">Laki-Laki</option>
                            <option value="Perempuan">Perempuan</option>
                            </option>
                        </select>

                    </div>
                </div>
                <div class="form-group row">
                    <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" name="alamat" id="alamat" placeholder=" Masukan Nama Alamat .." value="{{old('alamat')}}">
                        @error('alamat')
                        <span class="text-danger"> {{ $message }} </span>
                        @enderror
                    </div>

                </div>
                <div class="form-group row">
                    <label for="no_hp" class="col-sm-2 col-form-label">No Hp</label>
                    <div class="col-sm-5">
                        <input type="number" class="form-control" name="no_hp" id="no_hp" placeholder=" Masukan Nomor Handphone .." value="{{old('no_hp')}}">
                        @error('no_hp')
                        <span class="text-danger"> {{ $message }} </span>
                        @enderror
                    </div>

                </div>
                <div class="form-group row">
                    <label for="email" class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" name="email" id="email" placeholder=" Masukan Alamat  Email.." value="{{old('email')}}">
                        @error('email')
                        <span class="text-danger"> {{ $message }} </span>
                        @enderror
                    </div>

                </div>

                <div class="form-group row">
                    <label for="gambar" class="col-sm-2 col-form-label" value="{{old('gambar')}}">Gambar</label>
                        <div class="col-sm-5">
                        <input type="file" " name="gambar" id="gambar"">
                        </div>
                </div>

                <div><button type="submit" class="btn btn-sm btn-primary">Simpan</button>
                    <button type="reset" class="btn btn-sm btn-warning">Reset</button>
                </div>
            </div>
        </form>

    </section>
</div>
@endsection