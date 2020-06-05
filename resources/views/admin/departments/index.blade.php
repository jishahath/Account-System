@extends('layouts.app')

@section('title', '| Departments')

@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<div class="col-lg-10 col-lg-offset-1">
    <h1><i class="fa fa-key"></i> Departments
    <a href="{{ route('users.index') }}" class="btn btn-default pull-right">Users</a>
    </h1>
    <hr>
    <div class="table-responsive">
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Department</th>
                    <th>Operation</th>
                </tr>
            </thead>

            <tbody>
            @foreach($departments as $d) 
                <tr>
                    <td>{{$d->id}}</td>
                    <td>{{$d->name}}</td>
                    <td>
                        <a href="{{route('departments.edit', $d->id) }}" class="btn btn-info">Edit</a> 
                        <a href="javascript:void(0)" onclick="$(this).parent().find('form').submit()" class="btn btn-danger">Delete</a>
                        <form action="{{route('departments.destroy', $d->id) }}" method="post">
                            @method('DELETE')
                            <input type="hidden" name="_token" value="{{csrf_token() }}">
                        </form>

                        @endforeach
            </tbody>

        </table>

        <a href="{{ URL::to('departments/create') }}" class="btn btn-success">Add department</a>
    </div>


@endsection