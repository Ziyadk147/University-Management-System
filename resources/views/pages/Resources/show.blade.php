@extends('layouts.layout')

@section('content')
    <div class="row">
        <div class="col">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <div class="row">
                        <div class="col">
                            <h2 class="m-0 font-weight-bold text-primary">Resources</h2>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Resource Name</th>
                                <th>Subject</th>
                                <th>Actions</th>

                            </tr>
                            </thead>
                            <tbody>
                            @foreach($resources as $resource)
                                <tr>
                                    <td>{{$resource->id}}</td>
                                    <td>{{$resource->name}}</td>
                                    <td>{{$resource->tag}}</td>
                                    <td>
                                        @can('download-resource')
                                            <a href="{{route('resource.download',['filename' => $resource->path])}}" target="_blank">
                                                <button class="btn btn-primary">Download</button>
                                            </a>
                                        @endcan
                                        @can('edit-users')
                                            <a href="{{route('resource.edit',$resource->id)}}">
                                                <button class="btn btn-primary">Edit</button>
                                            </a>
                                        @endcan
                                        @can('delete-users')
                                            <button class="btn btn-danger delete-button" data-id="{{$resource->id}}">Delete</button>
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