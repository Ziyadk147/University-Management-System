@extends('layouts.layout')

@section('content')
    <div class="row">
        <div class="col">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <div class="row">
                        <div class="col">
                            <h2 class="m-0 font-weight-bold text-primary">Create New Resource</h2>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{route('resource.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label">Resource Name</label>
                            <input type="text" class="form-control" name="name">
                        </div>
                        <label for="form-label">Course</label>
                        <select class="form-select " aria-label="Default select example" name="course">
                            <option selected>Select A Course</option>
                            @foreach($courses as $course)
                                <option value="{{$course->id}}">{{$course->name}}</option>
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