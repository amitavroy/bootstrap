@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card">
                <div class="card-header">Manage</div>

                <ul class="list-group list-group-flush">
                    <li class="list-group-item">
                        <a href="{{route('roles.index')}}">Roles</a>
                        <br>
                        <small>Manage the system roles.</small>
                    </li>
                    <li class="list-group-item">
                        <a href="{{route('permissions.index')}}">Permissions</a>
                        <br>
                        <small>Manage the system permissions.</small>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection
