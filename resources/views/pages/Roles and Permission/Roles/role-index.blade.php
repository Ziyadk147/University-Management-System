@extends('layouts.layout')

@section('content')
    <div class="row">
        <div class="col">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <div class="row">
                        <div class="col">
                            <h2 class="m-0 font-weight-bold text-primary">Roles</h2>
                        </div>
                        <div class="col text-right">
                            <a href="{{route('role.create')}}"><button class="btn btn-primary btn-md">Create New Role</button></a>
                            <a href="{{route('role.bind')}}"><button class="btn btn-primary btn-md">Assign Role To User</button></a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Role</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach($roles as $item)
                                    <tr>
                                        <td>{{$item->id}}</td>
                                        <td>{{$item->name}}</td>
                                        <td>
                                            <a href="{{route('role.edit',$item->id)}}">
                                                <button class="btn btn-primary">Edit</button>
                                            </a>
                                            <button class="btn btn-danger delete-button" data-id="{{$item->id}}">Delete</button>
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