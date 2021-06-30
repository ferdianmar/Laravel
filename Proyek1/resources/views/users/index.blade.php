@extends('layouts.base')


@section('container')
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Tables</h1>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
        </div>
        <div class="card-body shadow-lg">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead class="bg-dark text-center text-light">
                        <tr>
                            <th>NO</th>
                            <th>NAME</th>
                            <th>EMAIL</th>
                            <th>ROLE</th>
                            <th>ACTION</th>
                        </tr>
                    </thead>

                    <tbody class=" text-center">
                        @foreach ($users as $user)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$user->name}}</td>
                            <td>{{$user->email}}</td>

                            <td>
                                @if ($user->level == 1)
                                <span class="badge badge-primary"> ADMIN </span>
                                @else
                                <span class="badge badge-success"> USER </span>
                                @endif
                            </td>

                            <td>
                                <form action="/user/delete/{{$user->id}}" method="post">
                                    @method('delete')
                                    @csrf 
                                
                                <a href="/user/edit/{{$user->id}}"> <span class="btn btn-sm btn-info pull-right"> DETAIL </span></a>
                                <button class="btn btn-sm btn-danger pull-right" onClick="confirm('Apakah anda yakin?')"><i class="fa fa-trash"></i> DELETE </button>
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
@endsection