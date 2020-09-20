@extends('students.dashboard.master')

@section('page-title')
Purchase History
@endsection

@section('content')
    <div class="container">
        <div class="card bg-gate-alt">
            <div class="card-body">
                If you have any issues regarding to purchase or payments please contact us.
            </div>
        </div>
        <div class="grid-3">
        @forelse ($transactions as $transaction)
        <div class="card">
            <div class="card-body">
                <table class="w-100">
                <tr>
                    <th>Test Series</th>
                    <td >{{ optional($transaction->test_series)->title ?? '--NA--' }}</td>
                </tr>
                <tr>
                    <th>TXN ID</th>
                    <td >{{ $transaction->txn_id }}</td>
                </tr>
                <tr>
                    <th>Date:</th>
                    <td>{{ $transaction->created_at->format('d M Y, h:i A') }}</td>
                </tr>
                <tr>
                    <th>Status: </th>
                    <td>{{ strtoupper($transaction->status) }}</td>
                </tr>
            </table>
            </div>
            <div class="card-footer">
                <a class="btn btn-info bg-gate" href="{{ route('students.transaction', $transaction->id) }}">Details/Print Mode</a>
            </div>
        </div>
        @empty
        <div class="card">
            <div class="card-body">
                No records found!
            </div>
        </div>    
        @endforelse
        </div>
    
    <div class="my-3">
        {{ $transactions->links() }}
    </div>
    </div>
@endsection