@extends('students.exam.master')

@section('content')
<div class="container-fluid d-flex justify-content-center pt-5">
    <div class="card" style="max-width: 600px">
        <div class="card-header card-header-success">
            <h3 class="text-center">Become a Member</h3>
        </div>
        <div class="card-body">
            <p class="card-text">Benefits:</p>
        </div>
        
        <div class="card-footer">
            <form class='w-100' action="https://sandboxsecure.payu.in/_payment" method="post">
                <input type="hidden" name="key" value="{{ $key }}" />
                <input type="hidden" name="hash" value="{{ $hash }}" />
                <input type="hidden" name="txnid" value="{{ $txnId }}" />
                <input type="hidden" name="amount" value="{{ $amount }}">
                <input type="hidden" name="firstName" value="{{ $firstName }}">
                <input type="hidden" name="email" value="{{ $user->email }}">
                <input type="hidden" name="phone" value="{{ $user->mobile }}">
                <input type="hidden" name="productinfo" value="membership">
                <input type="hidden" name="surl" value="{{ route('students.membership.success') }}">
                <input type="hidden" name="furl" value="{{ route('students.membership.failure') }}">
                <input type="hidden" name="service_provider" value="payu_paisa" size="64" />
                <button class="btn btn-success btn-block" value="submit">Purchase for a Year(365 Days)</button>    
            </form>
        </div>
    </div>
</div>
@endsection