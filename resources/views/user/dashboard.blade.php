@extends('layouts.app')

@section('content')

<div class="container">
   <h3 align="center">Income</h3><br />

    <div class="table-responsive">
        <table class="table table-bordered table-striped">
            <thead>
            <caption></caption>
                <tr>
                    <th>Amount</th>
                    <th>Source</th>
                    <th>Created At</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($income as $i)
                <tr>
                    <td>{{ $i->amount }}</td>
                    <td>{{ $i->source }}</td>
                    <td>{{$i->created_at}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
<br>
<br>

<div class="container">
   <h3 align="center">Expense</h3><br />

    <div class="table-responsive">
        <table class="table table-bordered table-striped">
            <thead>
            <caption></caption>
                <tr>
                    <th>Amount</th>
                    <th>Purpose</th>
                    <th>Created At</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($expense as $e)
                <tr>
                    <td>{{$e->amount }}</td>
                    <td>{{$e->purpose }}</td>
                    <td>{{$e->created_at}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection
