@extends('layouts.app')
@section('content')

<div class="content-header">
    <div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
        <h1 class="m-0 text-dark">Edit</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('home') }}">Dashboard</a></li>
            <li class="breadcrumb-item active">Edit</li>
        </ol>
        </div><!-- /.col -->
    </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>

<section class="content">
    <div class="container-fluid">
        <form method="post" action="{{route('expense.update', $expense->id) }}">
        {{ method_field('PUT') }}{{csrf_field()}}
        <input type="hidden" name="_token" value="{{csrf_token() }}">
            
            <div class="form-group">
                <div class="row">
                    <label class="col-md-3">Amount</label>
                    <div class="col-md-6"><input type="text" name="amount" class="form-control" value="{{$expense->amount }}"></div>
                    <div class="clearfix"></div>
                </div>
                <div class="row">
                    <label class="col-md-3">Purpose</label>
                    <div class="col-md-6"><input type="text" name="purpose" class="form-control" value="{{$expense->purpose }}"></div>
                    <div class="clearfix"></div>
                </div>

            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-info" value="Save">
            </div>
        </form>
    </div>
</section>

@endsection