@extends('layouts.base')

@section('container')
<div class="container">
    
<h3 class="text-center"><b> BIODATA KARYAWAN <b></h3>
<hr>
<p class="text-center"><img src="{{url('/')}}/anggota/{{$anggota->gambar}}" width="150" alt=""></p>
<table class="table text-center" style="font-size: 15px;">
    <tr>
        <td>Nama</td>
        <td>{{$anggota->nama}}</td>
    </tr>
    <tr>
        <td>Posisi</td>
        <td>{{$anggota->jabatan->nama_posisi}}</td>
    </tr>
    <tr>
        <td>Jenis Kelamin</td>
        <td>{{$anggota->jenis_kelamin}}</td>
    </tr>
    <tr>
        <td>Alamat</td>
        <td>{{$anggota->alamat}}</td>
    </tr>
    <tr>
        <td>No Hp</td>
        <td>{{$anggota->no_hp}}</td>
    </tr>
    <tr>
        <td>Email</td>
        <td>{{$anggota->email}}</td>
    </tr>
</table>
</div>

@endsection