@extends('layouts.admin')
@section('container')
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            @if (session('status'))
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>Pemberitahuan !</strong> {{session('status')}}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            @endif
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{url('home')}}">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Transaksi - Sudah Bayar</li>
                </ol>
            </nav>
        </div>
        <!-- Begin Page Content -->
        <div class="container">
            <div class="col-lg-12">

                <div class="card shadow ">
                    <div class="card-body">
                        <h5 class=" font-weight-bold text-primary text-center">DATA TRANSAKSI</h5>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover" id="dataTable">
                                <thead align="left">
                                    <tr>
                                        <th scope="col">No</th>
                                        <th class="text-center" scope="col">Nama</th>
                                        <th scope="col">Alamat</th>
                                        <th scope="col">Handphone</th>
                                        <th class="text-center" scope="col">Pesanan Id</th>
                                        <th class="text-center" scope="col">Transaksi</th>
                                        <th class="text-center" scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody align="left">
                                    @foreach ($transaksi as $transaksi)
                                    <tr>
                                        <th scope="row">{{$loop->iteration}}</th>
                                        <td class="text-center">{{$transaksi->name}}</td>
                                        <td>{{$transaksi->alamat}}</td>
                                        <td>{{$transaksi->notelpon}}</td>
                                        <td class="text-center">{{$transaksi->pesanan_id}}</td>
                                        <td class="text-center">@if ($transaksi->status == 2)
                                            <span class="badge badge-warning"> On Progress </span>
                                            @endif
                                        </td>
                                        <td class="text-center"><a href="{{url('/admin/transaksi')}}/{{$transaksi->pesanan_id}}" class="btn btn-info"> Detail</a></td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection