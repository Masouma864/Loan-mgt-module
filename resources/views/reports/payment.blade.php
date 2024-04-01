@extends('layouts.app')

@section('content') 
    <div class="container">
    <h1>Payment Report</h1>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Amount</th>
                <th>Date</th>
                <th>Type</th>
            </tr>
        </thead>
        <tbody>
            @foreach($payments as $payment)
            <tr>
                <td>{{ $payment->id }}</td>
                <td>{{ $payment->amount }}</td>
                <td>{{ $payment->date }}</td>
                <td>{{ $payment->type }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    </div>
    @endsection
