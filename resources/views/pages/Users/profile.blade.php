@extends('layouts.layout')

@section('content')
    <style>
        .rounded-image {
            width: 200px; /* Adjust the width as needed */
            height: 200px; /* Adjust the height as needed */
            overflow: hidden;
            border-radius: 50%;
        }

        .rounded-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
    </style>
    <div class="row">
        <div class="col">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <div class="row">
                        <div class="col">
                            <h2 class="m-0 font-weight-bold text-primary">Welcome {{$user->name}}!</h2>
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
                    <form action="{{route('user.update' , $user->id)}}" method="POST" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="rounded-image mx-auto">
                            <img class=" rounded-circle shadow-4-strong " alt="avatar2" src="{{asset('storage/images/'.$image)}}" />

                        </div>
                        <div class="mb-3">
                            <label class="form-label">Email</label>
                            <input type="email" class="form-control" value="{{$user->email}}" name="email">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">User Name</label>
                            <input type="text" class="form-control" value="{{$user->name}}" name="name">
                        </div>
                        {{--<div class="mb-3">
                            <label class="form-label">Password</label>
                            <input type="password" class="form-control" name="password">
                        </div>--}}
                        <label for="form-label">Role</label>
                        <select class="form-select " aria-label="Default select example" name="role">
                            <option disabled>Select A Role</option>
                            @foreach($roles as $role)
                                <option @if($user->role == $role->id)selected @endif value="{{$role->id}}">{{$role->name}}</option>
                            @endforeach
                        </select>
                        <div class="mb-3 mt-3">
                            <label for="formFileMultiple" class="form-label">Profile Picture</label>
                            <input class="form-control" type="file" name="image" >
                        </div>
                        <button type="submit" class="btn btn-primary mt-5">Submit</button>
                    </form>
                </div>
            </div>
        </div>

    </div>

@endsection