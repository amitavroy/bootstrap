@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">Edit role {{$role->name}}</div>

                    <div class="card-body">
                        <form action="{{route('roles.update')}}" method="post">
                            {{csrf_field()}}

                            <input type="hidden" name="id" value="{{$role->id}}">

                            <div class="form-group">
                                <input
                                        class="form-control"
                                        type="text"
                                        name="name"
                                        value="{{old('name', $role->name)}}"
                                        placeholder="Enter role name">
                            </div>

                            <button class="btn btn-primary mr-3">Save</button>
                            <a href="{{route('roles.index')}}">Back to Roles</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
