@extends('layouts.layout')

@section('content')
    <div class="row">
        <div class="col">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <div class="row">
                        <div class="col">
                            <h2 class="m-0 font-weight-bold text-primary">Edit Resource</h2>
                        </div>
                    </div>
                </div>
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
                    <form action="{{route('resource.update' , $resource->id)}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label class="form-label">Resource Name</label>
                            <input type="text" class="form-control" name="name" value="{{$resource->name}}">
                        </div>
                        <label for="form-label">Course</label>
                        <select class="form-select " aria-label="Default select example" name="course">
                            <option disabled>Select A Course</option>
                            @foreach($courses as $course)
                                <option @if($resource->tag == $course->id) selected @endif value="{{$course->id}}">{{$course->name}}</option>
                            @endforeach
                        </select>
                        <label class="form-label pt-3" for="customFile">Default file input example</label>
                        <input type="file" class="form-control" id="customFile" name="file"  accept=".pdf, .pptx"/>
                        <button type="submit" class="btn btn-primary mt-5">Submit</button>
                    </form>
                </div>
            </div>
        </div>

    </div>

@endsection