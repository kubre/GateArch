<x-simple-layout title="Become a member">
<div class="container d-flex flex-column justify-content-center pt-5">
    <h3>Benefits</h3>

    <p>
        <ul>
            <li>Unlock all the Test Series. (Take benefit of full library of test series prepared by our professionals.)</li>
            <li>Becoming a member helps GateArch.in, as we can continue to add high quality content and make sure it's updated frequently.</li>
            <li>Receive the Verified Member Badge(✅) next to your profile name.</li>
        </ul>
    </p>

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
        <button class="btn btn-light bg-gate btn-block" value="submit">Purchase for a Year(365 Days)</button>    
    </form>
</div>
</x-simple-layout>