<x-simple-layout title="Become a member">
<div class="container d-flex flex-column justify-content-center pt-5">
    <h3>{{ $series->title }}</h3>

    <p>
        <ul>
            @foreach ($series->exams as $exam)
                <li>{{ $exam->topic }}</li>
            @endforeach
        </ul>
        <a href=""></a>
    </p>

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
        <button class="btn btn-light bg-gate btn-block" value="submit">Buy for {{ $amount }}</button>    
    </form>
</div>
</x-simple-layout>