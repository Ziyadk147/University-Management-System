@extends('layouts.layout')

@section('content')
    <div class="row">
        <div class="col">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <div class="row">
                        <div class="col">
                            <h2 class="m-0 font-weight-bold text-primary">Create New Permission</h2>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{route('permission.update' , $permission->id)}}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label">permission Name</label>
                            <input type="text" class="form-control" name="name" value="{{$permission->name}}">
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="w-100"></div>

    </div>

@endsection