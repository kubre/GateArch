<x-simple-layout title="{{ ucfirst($transaction->status) }}">
    <div class="container">
        <h2 class="text-danger">{{ ucfirst($transaction->status) }}</h2>
        <table class="w-100">
            <tr>
                <th style="text-align: center;">Name</th>
                <td >{{ $transaction->student->name }}</td>
            </tr>
            <tr>
                <th style="text-align: center;">Test Series</th>
                <td >{{ $transaction->test_series->title }}</td>
            </tr>
            <tr>
                <th style="text-align: center;">TXN ID</th>
                <td >{{ $transaction->txn_id }}</td>
            </tr>
            <tr>
                <th style="text-align: center;">Bank Ref Number</th>
                <td >{{ $transaction->bank_ref_num }}</td>
            </tr>
            <tr>
                <th style="text-align: center;">Mode for Payment</th>
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
        </table>
        <div class="my-2">
        <a class="btn btn-info bg-gate" href="{{ route('students.transaction', $transaction->id) }}">Details/Print Mode</a>
        </div>
        <p class="text-danger">IF YOU HAVE ANY ISSUES REGARDING TO PURCHASE PLEASE CONTACT OUR SUPPORT.</p>
    </div>
</x-simple-layout>