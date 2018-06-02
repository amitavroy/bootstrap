@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Permissions</div>

                    <div class="card-body">
                        A list of all the permissions in the current system.
                        Or click <a href="{{route('permissions.add')}}">here</a> to create a new one.
                    </div>

                    <ul class="list-group list-group-flush">
                        @foreach($permissions as $permission)
                            <li class="list-group-item">
                                <span>{{ucfirst($permission->name)}}</span>
                                <span class="float-right">
                                    <a href="{{route('permissions.edit', $permission->id)}}" class="mr-3">Edit</a>
                                    <a href="#"
                                       v-cdelete.reload="{
                                        link: '{{route('permissions.delete')}}',
                                        message: 'Are you sure you want to delete {{ucfirst($permission->name)}} permission?',
                                        data: '{{json_encode(['id' => $permission->id])}}'
                                       }">Delete
                                    </a>
                                </span>
                            </li>
                        @endforeach
                    </ul>
                </div>

                <div class="pagination-container mt-3">
                    {{$permissions->render()}}
                </div>
            </div>
        </div>
    </div>
@endsection
