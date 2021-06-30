@extends('layouts.admin')

@section('container')
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb shadow-sm">
                    <li class="breadcrumb-item"><a href="{{url('admin')}}">Home</a></li>
                    <li class="breadcrumb-item">Transaksi</li>
                    <li class="breadcrumb-item active" aria-current="page">Detail</li>
                </ol>
            </nav>
        </div>
    <div class="col-lg-12">
        <div class="card p-4 shadow-sm">
            <h3 class="text-center"><i class="fa fa-shopping-cart"> Invoice Femi Foods</i></h3>
            @if (!empty($pesanans))
            <p align="right"> <strong> Status :
                    @if ($pesanans->status == 1)
                    <Span class="badge badge-danger badge-sm text-light">Menunggu Pembayaran</Span>
                    @elseif($pesanans->status == 2)
                    <Span class="badge badge-warning badge-sm text-light">Sedang Di Proses</Span>
                    @elseif($pesanans->status == 3)
                    <Span class="badge badge-success badge-sm text-light">Selesai</Span>
                    @endif
                </strong></p>
            <p align="right"> <strong> Tanggal : {{$pesanans->tanggal}} </strong></p>
            <div class="card-body">
                <table class="table table-sm">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Barang</th>
                            <th>Jumlah</th>
                            <th>Harga</th>
                            <th>Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pesanan_detail as $pesanan_detail )

                        <tr>
                            <th scope="row">{{$loop->iteration}}</th>
                            <td>{{$pesanan_detail->barang->nama_barang}}</td>
                            <td>{{$pesanan_detail->jumlah}}</td>
                            <td>Rp. {{ number_format($pesanan_detail->barang->harga) }}</td>
                            <td>Rp. {{number_format($pesanan_detail->jumlah_harga)}}</td>

                        </tr>
                        @endforeach
                        <tr>
                            <td colspan="4" align="right">
                                @if ($pesanans->status == 1)
                                <strong>Total Yang Harus Di Transfer :</strong>
                                @elseif($pesanans->status == 2)
                                <strong>Total :</strong>
                                @elseif($pesanans->status == 3)
                                <strong>Total :</strong>
                                @endif
                            </td>
                            <td><strong>Rp.{{number_format($pesanans->jumlah_harga)}}</strong> </td>
                        </tr>
                        <tr>
                            @if ($pesanans->status > 1)
                            <td colspan="4" align="right">
                                <strong>Sisa Saldo :</strong>
                            </td>
                            <td><strong>Rp.{{number_format(auth()->user()->saldo)}}</strong> </td>
                        </tr>
                        @endif
                    </tbody>
                </table>
                @endif
            </div>
        </div>
    </div>
</div>
</div>
@endsection