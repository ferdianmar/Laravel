@extends('layouts.base')
@section('container')
<div class="container">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Data User</h1>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <form method="post" enctype="multipart/form-data" action="/user/update/{{$users->id}}">
            @csrf

            <div class="form-group row">
                <label for="kode" class="col-sm-2 col-form-label">Kode</label>
                <div class="col-sm-10">
                    <input type="text" class="col-sm-2 form-control" id="kode" value="{{$users->id}}" readonly>
                </div>
            </div>
            <div class="form-group row">
                <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control col-sm-6" name="name" id="name" value="{{$users->name}}">
                </div>
            </div>
            
            <div class="form-group row">
                <label for="email" class="col-sm-2 col-form-label">Email</label>
                <div class="col-sm-10">
                    <input type="email" class="form-control col-sm-6" name="email" id="email" value="{{$users->email}}">
                </div>
            </div>

            <div class="form-group row">
                <label for="role" class="col-sm-2 col-form-label">Role</label>
                <div class="col-sm-10">
                    <select name="level" class="form-control col-sm-6" id="level">
                     <option value="{{$users->level}}">
                        @if ($users->level == 1)
                            Admin
                            <option value="2">User</option>
                            @elseif ($users->level ==2)
                            User
                            <option value="1">Admin</option>
                        @endif
                    
                    
                    </option>   

                    </select>
                </div>
            </div>

            
            <div><button type="submit" class="btn btn-sm btn-primary">Simpan</button></div>
        </form>

    </section>
</div>
@endsection