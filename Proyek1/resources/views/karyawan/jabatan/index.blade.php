@extends('layouts.base')
@section('container')
<div class="container-fluid">
    <div class="card-header">
        <br>
        @if (session('status'))
        <span class="aler alert-success">{{session('status')}}</span>
        @endif
        <h3 class="card-title">Tabel Jabatan</h3>
    </div>
    <!-- /.card-header -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary text-center">DAFTAR JABATAN</h6>
        </div>
        <div class="card-body shadow-lg">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead class="bg-dark text-center text-light">
                        <tr>
                            <th style="width: 10px">No</th>
                            <th>Nama Posisi</th>
                        </tr>
                    </thead>

                    <tbody class=" text-center">
                        @foreach ($jabatan as $data)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{ $data->nama_posisi }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection