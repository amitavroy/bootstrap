@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Roles</div>

                    <div class="card-body">
                        A list of all the roles in the current system.
                    </div>

                    <ul class="list-group list-group-flush">
                        @foreach($roles as $role)
                            <li class="list-group-item">{{ucfirst($role->name)}}</li>
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
