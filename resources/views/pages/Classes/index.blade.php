@extends('layouts.layout')

@section('content')
    <div class="row">
        <div class="col">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <div class="row">
                        <div class="col">
                            <h2 class="m-0 font-weight-bold text-primary">Classes</h2>
                        </div>
                        <div class="col text-right">
                            @can('create-classes')
                                <a href="{{route('classes.create')}}"><button class="btn btn-primary btn-md">Create New Class</button></a>
                            @endcan
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Classes</th>
                                <th>Capacity</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($classes as $class)
                                <tr>
                                    <td>{{$class->id}}</td>
                                    <td>{{$class->name}}</td>
                                    <td>{{$class->capacity}}</td>
                                    <td>
                                        @can('view-students')
                                            <a href="{{route('classes.students' , $class->id)}}">

                                                <button class="btn btn-primary">View Students</button>
                                            </a>
                                        @endcan
                                        @can('view-classes')
                                            <a href="{{route('classes.show',$class->id)}}">
                                                <button class="btn btn-primary">View Courses</button>
                                            </a>
                                        @endcan

                                        @can('edit-classes')
                                            <a href="{{route('classes.edit',$class->id)}}">
                                                <button class="btn btn-primary">Edit</button>
                                            </a>
                                        @endcan
                                        @can('delete-classes')
                                            <button class="btn btn-danger delete-button" data-id="{{$class->id}}">Delete</button>
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