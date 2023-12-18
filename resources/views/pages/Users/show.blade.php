@extends('layouts.layout')

@section('content')
    <div class="row">
        <div class="col">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <div class="row">
                        <div class="col">
                            <h2 class="m-0 font-weight-bold text-primary">User Profile</h2>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <div  class="mx-auto text-center">
                        <img class="img-fluid w-25 " src="{{asset('storage/images/'.$user->image->image)}}" alt='Agent picture' />
                    </div>
                    <form action="{{route('user.update' , $user->id)}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label class="form-label">Email</label>
                            <input type="email" class="form-control" name="email" value="{{$user->email}}">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">User Name</label>
                            <input type="text" class="form-control" name="name" value="{{$user->name}}">
                        </div>
                        <label for="form-label">Role</label>
                        <select class="form-select " aria-label="Default select example" name="role">
                            <option disabled>Select A Role</option>
                            @foreach($roles as $role)
                                <option value="{{$role->id}}" @if($user->role == $role->id)selected @endif>{{$role->name}}</option>
                            @endforeach
                        </select>
                        <label class="form-label pt-3" for="customFile">Upload Image</label>
                        <input type="file" class="form-control" id="customFile" name="image"  accept=".png , .jpeg, .jpg ,.svg"/>
                        <button type="submit" class="btn btn-primary mt-5">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection