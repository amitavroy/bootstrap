@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">Edit permission {{$permission->name}}</div>

                    <div class="card-body">
                        <form action="{{route('permissions.update')}}" method="post">
                            {{csrf_field()}}

                            <input type="hidden" name="id" value="{{$permission->id}}">

                            <div class="form-group">
                                <input
                                        class="form-control"
                                        type="text"
                                        name="name"
                                        value="{{old('name', $permission->name)}}"
                                        placeholder="Enter role name">
                                <div class="error-text">{{$errors->first('name')}}</div>
                            </div>

                            <button class="btn btn-primary mr-3">Save</button>
                            <a href="{{route('permissions.index')}}">Back to Roles</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
