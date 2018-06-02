@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">Create new permission</div>

                    <div class="card-body">
                        <form action="{{route('permissions.create')}}" method="post">
                            {{csrf_field()}}

                            <div class="form-group">
                                <label for="name">Permission name</label>
                                <input type="text" name="name" placeholder="Enter permissions name" class="form-control">
                                <span class="text-danger">{{$errors->first('name')}}</span>
                            </div>

                            <button class="btn btn-primary mr-3">Save</button>
                            <a href="{{route('permissions.index')}}">Back to Permissions</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
