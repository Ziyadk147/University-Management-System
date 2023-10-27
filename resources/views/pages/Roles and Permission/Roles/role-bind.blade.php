@extends('layouts.layout')

@section('content')
    <div class="row">
        <div class="col">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <div class="row">
                        <div class="col">
                            <h2 class="m-0 font-weight-bold text-primary">Bind user To Role</h2>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <form  action="{{route('role.bindRoleToUser')}}" method="POST">
                        @csrf
                        <div class="mb-5">
                            <label for="">Role</label>
                            <select class="form-select" aria-label="Default select example" name="role" id="roledropdown">
                                <option selected disabled>Select a Role</option>
                                @foreach($roles as $role)
                                    <option value="{{$role->id}}">{{$role->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-5">
                            <label>User</label>
                            <select class="form-select" aria-label="Default select example" name="user" id="userdropdown">
                                <option selected disabled>Select a User</option>
                                @foreach($users as $user)
                                    <option value="{{$user->id}}">{{$user->name}}</option>
                                @endforeach
                            </select>
                        </div>
{{--                        <div class="mb-3">--}}
{{--                            <table class="table" id="datatable">--}}
{{--                                <thead>--}}
{{--                                <tr>--}}
{{--                                    <th>ID</th>--}}
{{--                                    <th>user</th>--}}
{{--                                    <th>Select</th>--}}
{{--                                </tr>--}}
{{--                                </thead>--}}
{{--                                <tbody>--}}
{{--                                @foreach($users as $user)--}}
{{--                                    <tr>--}}
{{--                                        <td>{{$user->id}}</td>--}}
{{--                                        <td>{{$user->name}}</td>--}}
{{--                                        <td><input type="checkbox" id="user-no-{{$user->id}}" class="select-checkbox user" name="selected_user[]" value="{{$user->id}}"></td>--}}
{{--                                    </tr>--}}
{{--                                @endforeach--}}
{{--                                </tbody>--}}
{{--                            </table>--}}
{{--                        </div>--}}
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function(){
            $('#roledropdown').on('change' , function(){
                $('.user').prop('checked' , false)
                $.ajax({
                    {{--url:'{{route('user.getRoleuser')}}',--}}
                    type:'POST',
                    data:{
                        '_token':'{{csrf_token()}}',
                        'id':$(this).val(),
                    },
                    success:function(success){
                        $.each(success.data , function(key ,value){
                            $('#user-no-'+value).prop('checked' ,true) //makes the checkbox checked if the role has that particular user
                        })
                    }
                })
            })

        })
    </script>
@endsection