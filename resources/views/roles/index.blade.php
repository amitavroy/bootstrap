@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Roles</div>

                    <div class="card-body">
                        A list of all the roles in the current system. Or click <a href="{{route('roles.add')}}">here</a> to create a new one.
                    </div>

                    <ul class="list-group list-group-flush">
                        @foreach($roles as $role)
                            <li class="list-group-item">
                                <span>{{ucfirst($role->name)}}</span>
                                <span class="float-right">
                                    <a href="{{route('roles.edit', $role->id)}}" class="mr-3">Edit</a>
                                    <a href="#"
                                       v-cdelete.reload="{
                                        link: '{{route('roles.delete')}}',
                                        message: 'Are you sure you want to delete {{ucfirst($role->name)}} role?',
                                        data: '{{json_encode(['id' => $role->id])}}'
                                       }">Delete
                                    </a>
                                </span>
                            </li>
                        @endforeach
                    </ul>
                </div>

                <div class="pagination-container mt-3">
                    {{$roles->render()}}
                </div>
            </div>
        </div>
    </div>
@endsection
