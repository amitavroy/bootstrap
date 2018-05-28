@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">Create new role</div>

                    <div class="card-body">
                        <form action="{{route('roles.create')}}" method="post">
                            {{csrf_field()}}

                            <div class="form-group">
                                <label for="name">Role name</label>
                                <input type="text" name="name" placeholder="Enter role name" class="form-control">
                                <span class="text-danger">{{$errors->first('name')}}</span>
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
