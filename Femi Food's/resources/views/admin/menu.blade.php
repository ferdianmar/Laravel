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
                    <li class="breadcrumb-item active" aria-current="page">Manage Menu</li>
                </ol>
            </nav>
           
        </div>
        <!-- Begin Page Content -->
        <div class="container">
            <div class="col-lg-12">

                <div class="card shadow ">
                    <div class="card-body">
                        <h5 class=" font-weight-bold text-primary text-center">DATA MENU</h5>
                        <a href="" data-toggle="modal" data-target="#TambahModal" class="btn btn-sm btn-primary"><i class="fa fa-plus"></i> Tambah Menu</a>   
                    </div>
                    
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover" id="dataTable">
                                <thead align="left">
                                    <tr>
                                        <th scope="col">No</th>
                                        <th class="text-center" scope="col">Nama</th>
                                        <th scope="col">Harga</th>
                                        <th class="text-center" scope="col">Stok</th>
                                        <th class="text-center" scope="col">Terjual</th>
                                        <th class="text-center" scope="col">Bonus</th>
                                        <th class="text-center" scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody align="left">
                                    @foreach ($menu as $menu)
                                    <tr>
                                        <th scope="row">{{$loop->iteration}}</th>
                                        <td class="text-center">{{$menu->nama_barang}}</td>
                                        <td>{{$menu->harga}}</td>
                                        <td class="text-center">{{$menu->stok}}</td>
                                        <td class="text-center">
                                        @if($menu->terjual == 0)
                                        0
                                        @else
                                        {{$menu->terjual}}
                                        @endif
                                        </td>
                                        <td class="text-center">{{$menu->ket}}</td>
                                        <td class="text-center">
                                            <form action="/menu/delete/{{$menu->id}}" method="post">
                                                @method('delete')
                                                @csrf
                                                <a href="{{url('/')}}/admin/menu/{{$menu->id}}" class="btn btn-sm btn-warning">Edit</a>
                                                <button class="btn btn-sm btn-danger pull-right" onClick="confirm('Apakah anda yakin?')">Hapus</button>
                                            </form>
                                        </td>
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

<div class="modal fade " id="TambahModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Form Input Menu</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="/tambahbarang" enctype="multipart/form-data" method="post">
                    @csrf
                    <div>
                        <label for="">Nama Menu</label>
                        <input type="text" class="form-control" name="nama_barang">
                        @error('nama_barang')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div>
                        <label for="">Harga Menu</label>
                        <input type="number" class="form-control" name="harga" require>
                        @error('harga')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div>
                        <label for="">Stock Menu</label>
                        <input type="number" class="form-control" name="stok">
                        @error('stok')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div>
                        <label for="">Bonus</label>
                        <select name="ket" id="" class="form-control">
                            <option value="Tidak Ada."> Pilih Bonus </option>
                            <option value="Gratis 2 Minuman"> Gratis 2 Minuman" </option>
                            <option value="Beli 3 Gratis 1"> Beli 3 Gratis 1 </option>
                            <option value="Beli 1 Gratis 1"> Beli 3 Gratis 1 </option>
                        </select>
                    </div>
                    <div>
                        <label for="">Upload Gambar</label>
                        <input type="file" class="form-control" name="gambar">
                    </div>
                    <div class="mt-3">
                        <button type="submit" class="btn btn-sm btn-success" style="width: 200px;"> Simpan </button>
                        <button type="reset" class="btn btn-sm btn-danger"> Reset </button>
                    </div>
                </form>
            </div>
        </div>

    </div>
@endsection