@extends('students.exam.master')

@section('header')
<style>
    body {
        background: white;
    }

    table, tr, th, td {
        border: 1px solid #212121;
        border-collapse: collapse;
    }

    td, th {
        padding: 10px 20px;
    }

    @media print {
        .dont-print {
            display: none;
        }
    }
</style>
@endsection

@section('content')
<div>
    <div class="container">
        <div class="text-center mt-2">
            <img height="100" src="/images/index/logo.png" alt="GateArch Logo">
        </div>
        <div class="d-flex justify-content-between mt-3 py-2">
        <h4>Inovice for Purchase of Test Series on gatearch.in</h4>
        <h4>Date: {{ $transaction->created_at->format('d M Y') }}</h4>
        </div>
        <table class="w-100 mt-2">
            <tr>
                <th>Purchase By</th>
                <td>{{ strtoupper($transaction->student->name) }} ({{ $transaction->student->mobile }})</td>
            </tr>
            <tr>
                <th>Test Series</th>
                <td >{{ $transaction->test_series->title }}</td>
            </tr>
            <tr>
                <th>Status</th>
                <td>{{ strtoupper($transaction->status) }}</td>
            </tr>
            <tr>
                <th>TXN ID</th>
                <td >{{ $transaction->txn_id }}</td>
            </tr>
            <tr>
                <th>Bank Ref Number</th>
                <td >{{ $transaction->bank_ref_num }}</td>
            </tr>
            <tr>
                <th>Mode for Payment</th>
                <td >
                    @switch($transaction->mode)
                        @case('NB')
                            Net Banking
                            @break
                        @case('CC')
                            Credit Card
                            @break
                        @case('DC')
                            Debit Card
                            @break
                        @default
                            Other
                    @endswitch
                </td>
            </tr>
            <tr>
                <th>Student Comment</th>
                <td>{{ $transaction->student_comment }}</td>
            </tr>
            <tr>
                <th>Admin Comment</th>
                <td>{{ $transaction->admin_comment }}</td>
            </tr>
            <tr>
                <th>System Transaction ID</th>
                <td>{{ $transaction->id }}</td>
            </tr>
        </table>
        <div class="dont-print mt-3">
            <a style="background: #dd9900" href="{{ route('students.purchase.history') }}" class="btn btn-info mr-2">Back</a>
            <a style="background: #388087" onclick="window.print()" href="#" class="btn btn-info">Print</a>
        </div>
    </div>
</div>
@endsection