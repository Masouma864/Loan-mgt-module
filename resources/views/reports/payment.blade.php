@extends('layouts.app')

@section('content') 
    <div class="container">
        <h1>Payment Report</h1>
        <table style="width:100%; border-collapse: collapse;">
            <thead>
                <tr>
                    <th style="border: 1px solid #ddd; padding: 8px;">ID</th>
                    <th style="border: 1px solid #ddd; padding: 8px;">Amount</th>
                    <th style="border: 1px solid #ddd; padding: 8px;">Date</th>
                    <th style="border: 1px solid #ddd; padding: 8px;">Type</th>
                </tr>
            </thead>
            <tbody>
                @foreach($payments as $payment)
                    <tr>
                        <td style="border: 1px solid #ddd; padding: 8px;">{{ $payment->id }}</td>
                        <td style="border: 1px solid #ddd; padding: 8px;">{{ $payment->amount }}</td>
                        <td style="border: 1px solid #ddd; padding: 8px;">{{ $payment->payment_date }}</td>
                        <td style="border: 1px solid #ddd; padding: 8px;">{{ $payment->loan_id }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
