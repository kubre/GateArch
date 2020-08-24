@props(['class', 'price', 'discount', 'discountedPrice', 'prefix'])

<span class="{{$class}}">
    <span>{{ $prefix }}</span>
    @if ($discount != 0)
    <del class="text-danger ml-2">₹ {{ $price }}</del>
    @endif
    <strong class="ml-2">₹ {{ $discountedPrice ?: "FREE" }} /-</strong>
    @if($discount != 0)
    <strong class="bg-danger rounded-pill text-white ml-2 py-1 px-3">Save {{ $discount }}%</strong>
    @endif
</span>