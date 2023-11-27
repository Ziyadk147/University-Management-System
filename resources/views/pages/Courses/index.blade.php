@extends('layouts.layout')

@section('content')
    <div class="row">
        <div class="col">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <div class="row">
                        <div class="col">
                            <h2 class="m-0 font-weight-bold text-primary">Course</h2>
                        </div>
                        <div class="col text-right">
{{--                            @can('create-courses')--}}
                                <a href="{{route('courses.create')}}"><button class="btn btn-primary btn-md">Create New Course</button></a>
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
                                <th>courses</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($courses as $course)
                                <tr>
                                    <td>{{$course->id}}</td>
                                    <td>{{$course->name}}</td>
                                    <td>
{{--                                                                                @can('edit-courses')--}}
                                        <a href="{{route('courses.edit',$course->id)}}">
                                            <button class="btn btn-primary">Edit</button>
                                        </a>
{{--                                                                                @endcan--}}
{{--                                                                                @can('delete-courses')--}}
                                        <button class="btn btn-danger delete-button" data-id="{{$course->id}}">Delete</button>
{{--                                                                                @endcan--}}
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