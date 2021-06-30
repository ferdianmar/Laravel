@extends('layouts.base')

@section('container')
<div class="container">
    <div class="row ">
        <div class="col-md-12 text-center">
            <h2>Selamat Datang {{auth()->user()->name}}</h2>
            <h2>APLIKASI PENGGAJIAN KARYAWAN DI CV SIMPATI</h2>
            
        </div>
    </div>
</div>
@endsection