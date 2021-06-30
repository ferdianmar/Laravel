@extends('layouts.base')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col">

            <div class="container">
                <div class="row">
                    @foreach ($barangs as $barang)
                    <div class="col-md-4">
                        <div class="card p-1 rounded shadow mb-5" style=" width: 17rem; ">
                            <img src=" {{url('/')}}/barang/{{$barang->gambar}}" height="150" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title text-center">{{$barang->nama_barang}}</h5>
                                <table class="table">
                                    <tbody>
                                        <td> <strong> Harga </strong></td>
                                        <td> <strong> : </strong> </td>
                                        <td> Rp.{{ number_format($barang->harga)  }}</td>
                                    </tbody>
                                    <tbody>
                                        <td> <strong> Stok </strong></td>
                                        <td> <strong> : </strong> </td>
                                        <td> {{$barang->stok }} Porsi</td>
                                    </tbody>

                                </table>
                                <p class="card-text">
                                <h6><strong>Keterangan :</strong> </h6>
                                <h6>{{$barang->ket }}</h6>
                                </p>
                                <a href="/pesanan/{{$barang->id}}" class="btn btn-primary"><i class="fa fa-plus"> Tambah </i> </a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>

        </div>
    </div>
</div>
@endsection