@extends('layouts.layout')

@section('content')
    <div class="row">
        <div class="col">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <div class="row">
                        <div class="col">
                            <h2 class="m-0 font-weight-bold text-primary">Edit User</h2>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{route('user.update' , $user->id)}}" method="POST">
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
                        <div class="mb-3">
                            <select class="form-select " aria-label="Default select example" name="role">
                                <option disabled>Select A Role</option>
                                @foreach($roles as $role)
                                    <option value="{{$role->id}}" @if($user->role == $role->id)selected @endif>{{$role->name}}</option>
                                @endforeach

                            </select>
                        </div>

                        <div class="mb-3" id="empty-space">

                        </div>
                        <button type="submit" class="btn btn-primary mt-5">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        $(document).ready(function(){
            $("#role").change(function(){
                $("#empty-space").empty()
                const roleName = $(this).find("option:selected").text();
                if(roleName === "student"){
                    const html = `
                        <label for="form-label">Classes</label>
                            <select class="form-select " aria-label="Default select example" id="class" name="class" required>
                                <option disabled>Select A class</option>
                                @foreach($classes as $class)
                                    <option value="{{$class->id}}" @if($user->student->role == $class->id)selected @endif>{{$class->name}}</option>

                                @endforeach
                    </select>`

                    $("#empty-space").append(html);
                }
            });
        })
    </script>
@endsection