@extends('layouts.app')
@section('content')

<div class="content-header">
    <div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
        <h1 class="m-0 text-dark">Income</h1>
        </div>
        <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('home') }}">Dashboard</a></li>
            <li class="breadcrumb-item active">Income</li>
        </ol>
        </div>
    </div>
    </div>
</div>

<section class="content">
    <div class="container-fluid">
        <p>
            <a href="{{route('income.create') }}" class="btn btn-primary">Add</a>
        </p>
        <table class="table table-bordered table-stripped">
            <tr>
                <th>Amount</th>
                <th>Source</th>
                <th>Action</th>
            </tr>
            @foreach($incomes as $income) 
                <tr>
                    <td>{{$income->amount}}</td>
                    <td>{{$income->source}}</td>
                    <td>
                        <a href="{{route('income.edit', $income->id) }}" class="btn btn-info">Edit</a> 
                        <a href="javascript:void(0)" onclick="$(this).parent().find('form').submit()" class="btn btn-danger">Delete</a>
                        <form action="{{route('income.destroy', $income->id) }}" method="post">
                            @method('DELETE')
                            <input type="hidden" name="_token" value="{{csrf_token() }}">
                        </form>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
</section>

@endsection