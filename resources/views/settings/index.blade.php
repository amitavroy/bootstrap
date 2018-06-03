@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-7">
                <div class="card">
                    <div class="card-header">Settings</div>

                    <div class="card-body">
                        @if (is_array($data))
                            <table class="table table-bordered table-striped table-hover">
                                <thead>
                                <tr>
                                    <th>Key</th>
                                    <th>Value</th>
                                </tr>
                                </thead>

                                <tbody>
                                @foreach($data as $key => $value)
                                    <tr>
                                        <td>{{$key}}</td>
                                        <td>{{$value}}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        @else
                            There are no settings added yet.
                        @endif
                    </div>
                </div>
            </div>
            <div class="col-md-5">
                <div class="card">
                    <div class="card-header">Add new setting</div>

                    <div class="card-body">
                        <form action="{{route('settings.add')}}" method="post">
                            {{csrf_field()}}

                            <div class="form-group">
                                <label for="name">Name of the setting</label>
                                <input type="text"
                                       class="form-control"
                                       placeholder="Enter the setting name"
                                       name="name">
                            </div>

                            <div class="form-group">
                                <label for="name">Value of the setting</label>
                                <textarea name="value" id="value" class="form-control" placeholder="Enter the actual value"></textarea>
                            </div>

                            <button class="btn btn-primary">Save</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
