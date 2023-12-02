@extends('layouts.layout')

@section('content')
    <div class="row">
        <div class="col">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <div class="row">
                        <div class="col">
                            <h2 class="m-0 font-weight-bold text-primary">Create New Role</h2>
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
                    <form action="{{route('classes.update' , $class->id)}}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label class="form-label">Class Name</label>
                            <input type="text" class="form-control" value="{{$class->name}}" name="name">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Capacity</label>
                            <input type="number" min="0" max="100" class="form-control" value="{{$class->capacity}}" name="capacity">
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="w-100"></div>

    </div>

@endsection
































