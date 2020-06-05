@extends('layouts.app')

@section('title', '| Edit Department')

@section('content')

<div class='col-lg-4 col-lg-offset-4'>
    <h1><i class='fa fa-key'></i> Edit Department: {{$department->name}}</h1>
    <hr>

    {{ Form::model($department, array('route' => array('departments.update', $department->id), 'method' => 'PUT')) }}

    <div class="form-group">
        {{ Form::label('name', 'Department Name') }}
        {{ Form::text('name', null, array('class' => 'form-control')) }}
    </div>

    <br>
    {{ Form::submit('Edit', array('class' => 'btn btn-primary')) }}

    {{ Form::close() }}    
</div>

@endsection