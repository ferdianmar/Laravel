@extends('layouts.app')

@section('container')
<div class="container">
    <div class="row">
        <div class="col-lg-6">
            <div class="card">
                <div class="card-header bg-dark text-light">
                    <h6 class="text-center"> TAMBAH USER </h6>
                </div>
                <div class="card-body">
                    <div>
                        <label for="" class="my-2 ml-2"> NAMA USER </label>
                        <input type="text" class="form-control" placeholder="Masukan Nama .. " value="{{old('name')}}" name="name">
                    </div>
                    <div>
                        <label for="" class="my-2 ml-2"> EMAIL </label>
                        <input type="email" class="form-control" placeholder="Masukan Email .. " value="{{old('Email')}}" name="name">
                    </div>
                </div>
                <div class="card-footer">
                    <a href="" class="btn btn-success"> TAMBAH </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection