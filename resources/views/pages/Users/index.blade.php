@extends('layouts.layout')

@section('content')
    <div class="row">
        <div class="col">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <div class="row">
                        <div class="col">
                            <h2 class="m-0 font-weight-bold text-primary">Users</h2>
                        </div>
                        <div class="col text-right">
                            @can('create-users')
                                <a href="{{route('user.create')}}"><button class="btn btn-primary btn-md">Create New User</button></a>
                            @endcan
                        </div>
                    </div>
                </div>
                    <div class="table-responsive">

                        <div class="card-body">
                            @if ($errors->any())
                                <div class="alert alert-danger auto-close alert-dismissible fade show" role="alert">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @endif
                            <table class="table" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Users</th>
                                <th>Role</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($users as $item)
                                <tr>
                                    <td>{{$item->id}}</td>
                                    <td>{{$item->name}}</td>
                                    <td>{{\Spatie\Permission\Models\Role::findById($item->role)->name}}</td>
                                    <td>
                                        @can('edit-users')
                                            <a href="{{route('user.edit',$item->id)}}">
                                                <button class="btn btn-primary">Edit</button>
                                            </a>
                                        @endcan
                                        @can('delete-users')
                                            <button class="btn btn-danger delete-button" data-id="{{$item->id}}">Delete</button>
                                        @endcan
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

    <script src="{{asset('assets/js/core/deletefunction.js')}}" type="text/javascript"></script>
    <script>

        $(document).ready(function(){
            console.log(window.location.pathname.split('/')[1])
            $('#dataTable').DataTable({
                "bPaginate": true,
                "bInfo": false,
                "scrollY": '70vh',
                "scrollCollapse": true,
                "scrollX": true,
                //responsive:true
            });
        });
    </script>
@endsection