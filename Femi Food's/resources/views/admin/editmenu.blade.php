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
                    <li class="breadcrumb-item"><a href="{{url('admin')}}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{url('admin/menu')}}">Menu</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Edit Menu</li>
                </ol>
            </nav>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="col-lg-6 mx-auto">
                        <div class="card">
                            <div class="card-body">
                                <form action="/menu/{{$menu->id}}/update" method="post">
                                    @method('patch')
                                    @csrf
                                    <div class="mt-2">
                                        <label for=""><strong> Nama Menu</strong> </label>
                                        <input type="text" class="form-control col-lg" value="{{$menu->nama_barang}}" name="nama_barang">
                                    </div>
                                    <div class="mt-2">
                                        <label for=""> <strong> Harga</strong></label>
                                        <input type="text" class="form-control col-lg" value="{{$menu->harga}}" name="harga">
                                    </div>

                                    <div class="mt-2">
                                        <label for=""><strong> Stok</strong> </label>
                                        <input type="number" class="form-control col-lg" value="{{$menu->stok}}" name="stok">
                                    </div>
                                    <label for="" class="mt-2"><strong> Bonus </strong> </label>
                                    <div class="">
                                        <textarea name="ket" rows="3" class="form-control col-lg">{{$menu->ket}}</textarea>
                                    </div>
                                    <div class="mt-2">
                                        <button class="btn btn-primary btn-block"> Update Menu </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection