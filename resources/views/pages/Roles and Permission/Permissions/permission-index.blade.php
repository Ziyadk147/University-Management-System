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
                            <a href="{{route('permission.create')}}"><button class="btn btn-primary btn-md">Create New Permission</button></a>
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
                                        <a href="{{route('permission.edit',$item->id)}}">
                                            <button class="btn btn-primary">Edit</button>
                                        </a>
                                        <a href="{{route('permission.delete',$item->id)}}">
                                            <button class="btn btn-danger">Delete</button>
                                        </a>
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


    <script>
        $(document).ready(function(){
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
        })
    </script>
@endsection