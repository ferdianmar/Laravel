@extends('layouts.base-cetak')

@section('cetak')
<div class="container">
    
<h3 class="text-center"><b> CV SIMPATI <b></h3>
<h5 class="text-center">JL. XXXX Lamongan</h5>
<hr>
<table>
<tr>
<td style="padding-left: 50px"">
    
    <h6 class="text-left">Kepada</h6>
    <h6 class="text-left">Nama : {{$gaji->anggota->nama}}</h6>
    <h6 class="text-left">Posisi : {{$gaji->jabatan->nama_posisi}}</h6>    


<td style="padding-left: 600px">
    <h6 class="text-left">Bukti Pembayaran Gaji</h6>
    <h6 class="text-left">{{$gaji->tanggal}}</h6></td>
</td>
</tr>
</table>
<br>

<h4 class="text-center"><b> Deskripsi Gaji </b></h4>
<br>
<table class="table text-center" style="font-size: 15px;">
    <tr>
        <td>Gaji Pokok</td>
        <td>:</td>
        <td>{{$gaji->gaji}}</td>
    </tr>
    <tr>
        <td>Lembur</td>
        <td>:</td>
        <td>{{$gaji->lembur}}</td>
    </tr>
    <tr>
        <td>Total Gaji</td>
        <td>:</td>
        <td>{{$gaji->total_gaji}}</td>
    </tr>
</table>
</div>
</div>

@endsection
  
