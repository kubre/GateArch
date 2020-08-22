<x-simple-layout title="{{ $series->title }}">
<div class="container d-flex flex-column justify-content-center">
    <p>{!! $series->description !!}</p>
    <p>
        <strong>This Test series will include following exams: </strong>
        <ul>
            @forelse ($series->exams as $exam)
                <li>{{ $exam->topic }}</li>
            @empty
                <li>Coming Soon...</li>
            @endforelse
        </ul>
    </p>
    <div class="d-flex align-items-center my-2"><span class="material-icons mr-2">today</span> Available from: {{ optional($series->start_date)->format('d M Y') ?? $series->created_at->format('d M Y') }}</div>
    <div class="mt-2 mb-4">
     <x-discount 
        prefix="Price: "
        price="{{ $series->price }}"
        discount="{{ $series->discount }}"
        discountedPrice="{{ $amount }}"
        />
    </div>
    @if ($series->isStarted())
    <form class='w-100' target="_top" action="https://secure.payu.in/_payment" method="post">
        <input type="hidden" name="key" value="{{ $key }}" />
        <input type="hidden" name="hash" value="{{ $hash }}" />
        <input type="hidden" name="txnid" value="{{ $txnId }}" />
        <input type="hidden" name="amount" value="{{ $amount }}">
        <input type="hidden" name="firstName" value="{{ $firstName }}">
        <input type="hidden" name="email" value="{{ $user->email }}">
        <input type="hidden" name="phone" value="{{ $user->mobile }}">
        <input type="hidden" name="udf1" value="{{ $user->id }}">
        <input type="hidden" name="productinfo" value="{{ $product }}">
        <input type="hidden" name="surl" value="{{ route('students.purchase.success') }}">
        <input type="hidden" name="furl" value="{{ route('students.purchase.failure') }}">
        <input type="hidden" name="service_provider" value="payu_paisa" size="64" />
        <button style="font-weight: bold" class="btn btn-light bg-gate btn-block" value="submit">Buy Now</button>    
    </form>
    @else
    <strong class="bg-gate text-white py-2 px-4 rounded">This test series will be available on {{ optional($series->start_date)->format('d M Y') }}, You can come back later on the day to Add/Purchase it.</strong>
    @endif
</div>
</x-simple-layout>