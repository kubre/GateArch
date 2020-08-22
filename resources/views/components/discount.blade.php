@props(['price', 'discount', 'discountedPrice', 'prefix'])

<span>
    <span>{{ $prefix }}</span>
    @if ($discount != 0)
    <del class="text-danger ml-2">₹ {{ $price }}</del>
    @endif
    <strong class="ml-2">₹ {{ $discountedPrice ?: "FREE" }} /-</strong>
    @if($discount != 0)
    <strong class="bg-gate-alt rounded text-white ml-2 py-1 px-2">Save {{ $discount }}%</strong>
    @endif
</span>