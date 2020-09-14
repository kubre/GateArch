<x-simple-layout title="Online test series">
    @forelse ($serieses as $series)    
    <div style="border-bottom: 1px solid #a9a9a9" class="container d-flex flex-column justify-content-center pb-4">
        <h3>{{ $series->title }}</h3>
        <div class="toggle-div show-less">
            <p>{!! $series->description !!}</p>
            <strong>This Test series will include following exams: </strong>
            <ul>
                @forelse ($series->exams as $exam)
                    <li>{{ $exam->topic }}</li>
                @empty
                    <li>Coming Soon...</li>
                @endforelse
            </ul>
        </div>
        <button class="mw-50 mx-auto btn bg-gate-alt btn-show-toggle">Show More ▾</button>
        
        <div class="mt-2 mb-4 row">
        <div class="d-flex align-items-center col-md-6"><span class="material-icons mr-2">today</span> Available from: {{ optional($series->start_date)->format('d M Y') ?? $series->created_at->format('d M Y') }}</div>
        <x-discount 
            class="col-md-6 text-right"
            prefix="Price: "
            price="{{ $series->price }}"
            discount="{{ $series->discount }}"
            discountedPrice="{{ $series->discounted_price }}"
            />
        </div>
        @if($series->isStarted())
        <a href="{{ route('students.purchase.show', $series->id) }}" class='btn bg-gate btn-sm text-white py-2 px-3'>
            {{ $series->discounted_price == 0 ? "Add Free" : "Buy Now" }}
        </a>
        @endif
    </div>
    @empty
    <strong>No Data Available</strong>
    @endforelse
    <div class="mt-5">
        {{ $serieses->links() }}
    </div>

    <x-slot name="scripts">
       <script>
       $(function() {
           $(".btn-show-toggle").click(function() {
                $(this).siblings(".toggle-div").toggleClass('show-less');
                $(this).text( $(this).text() == 'Show More ▾' ? 'Show Less ▴' : 'Show More ▾' )
           });
       });
       </script> 
    </x-slot>
</x-simple-layout>
    