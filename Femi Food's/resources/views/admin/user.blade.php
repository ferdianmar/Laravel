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
                    <li class="breadcrumb-item active" aria-current="page">Manage User</li>
                </ol>
            </nav>
        </div>
        <!-- Begin Page Content -->
        <div class="container">
            <div class="col-lg-12">

                <div class="card shadow ">
                    <div class="card-body">
                        <h5 class=" font-weight-bold text-primary text-center">DATA USER</h5>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover" id="dataTable">
                                <thead align="left">
                                    <tr>
                                        <th scope="col">No</th>
                                        <th class="text-center" scope="col">Nama</th>
                                        <th class="text-center" scope="col">Email</th>
                                        <th class="text-center" scope="col">Alamat</th>
                                        <th class="text-center" scope="col">Role</th>
                                        <th class="text-center" scope="col">Saldo</th>
                                        <th class="text-center" scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody align="left">
                                    @foreach ($user as $user)
                                    <tr>
                                        <th scope="row">{{$loop->iteration}}</th>
                                        <td class="text-center">{{$user->name}}</td>
                                        <td class="text-center">{{$user->email}}</td>
                                        <td class="text-center">{{$user->alamat}}</td>
                                        <td class="text-center">
                                            @if($user->level == 1)
                                                <span class="badge badge-success"> Admin </span>
                                            @elseif($user->level == 2)
                                                <span class="badge badge-primary"> Kasir </span>
                                            @else
                                                <span class="badge badge-dark"> Pelanggan </span>
                                            @endif
                                        </td>
                                        <td class="text-center">
                                            @if($user->saldo == "")
                                            Rp. 0
                                            @else
                                            Rp. {{$user->saldo}}
                                            @endif
                                        </td>
                                        <td class="text-center"><a href="{{url('/')}}/admin/user/{{$user->id}}" class="btn btn-info">Tambah Saldo</a></td>
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