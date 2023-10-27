@extends('layouts.layout')

@section('content')
    <div class="row">
        <div class="col">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <div class="row">
                        <div class="col">
                            <h2 class="m-0 font-weight-bold text-primary">Permissions</h2>
                        </div>
                        <div class="col text-right">
{{--                            @can('create-permissions')--}}
                                <a href="{{route('permission.create')}}"><button class="btn btn-primary btn-md">Create New Permission</button></a>
{{--                            @endcan--}}
{{--                            @can('bind-permissions')--}}
                                <a href="{{route('permission.bind')}}"><button class="btn btn-primary btn-md">Bind Permission To Role</button></a>
{{--                            @endcan--}}
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>permission</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($permissions as $item)

                                <tr>
                                    <td>{{$item->id}}</td>
                                    <td>{{$item->name}}</td>
                                    <td>
                                        @can('edit-permissions')
                                            <a href="{{route('permission.edit',$item->id)}}">
                                                <button class="btn btn-primary">Edit</button>
                                            </a>
                                        @endcan
                                        @can('delete-permissions')
                                            <button class="btn btn-danger btn-md delete-button" data-id="{{$item->id}}">Delete</button>
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