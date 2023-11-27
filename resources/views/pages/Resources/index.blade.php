@extends('layouts.layout')

@section('content')
    <style>
        a ,a:hover ,a:active ,a:focus{
            text-decoration: none;
        }
        .link-card {
            /*width: 18rem;*/
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease-in-out;
        }

        .card-link {
            text-decoration: none;
            color: inherit;
        }

        .link-card:hover {
            transform: scale(1.1); /* Increase the size on hover */
        }

        .card-body {
            padding: 20px;
        }
    </style>
    <div class="row">
        <div class="col">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <div class="row">
                        <div class="col">
                            <h2 class="m-0 font-weight-bold text-primary">Users</h2>
                        </div>
{{--                        <div class="col text-right">--}}
{{--                            @can('create-users')--}}
{{--                                <a href="{{route('user.create')}}"><button class="btn btn-primary btn-md">Create New User</button></a>--}}
{{--                            @endcan--}}
{{--                        </div>--}}
                    </div>
                </div>

                <div class="card-body">
                    <div class="row">

                        @foreach($courses as $course)
                            <div class="col">
                                <div class="link-card border" >
                                    <a href="{{route('resource.show' , $course->id)}}">
                                        <div class="card-body h-100">
                                            <h5 class="card-title">{{$course->name}}</h5>
                                            <p class="card-text">{{$course->name}} material</p>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            @endforeach


                    </div>


                </div>
            </div>

        </div>
    </div>

@endsection