<x-simple-layout title="Blog">
    <x-slot name="styles">
        <style>
            .post-wrapper {
                transition: background .3s;
                border-radius: 5px;
                margin-bottom: 20px;
                border-bottom: 2px dashed rgba(0, 0, 0, .3);
            }

            .post-wrapper:hover {
                background: rgba(243, 172, 78, 0.342);
                border-bottom-color: transparent; 
            }
        </style>
    </x-slot>
    <div class="alert bg-gate d-flex align-items-center">
        <span class="material-icons mr-2">info</span>
        <div>Click on the post to read more</div>
    </div>
    @forelse ($posts as $post)    
    <a style="display: block; color: #343434" href="{{ route('posts', $post->id) }}">
    <div class="container d-flex flex-column justify-content-center pb-1 post-wrapper">
        <h3>{{ $post->title }}</h3>
        <div class="mt-2 row">
            <div class="d-flex align-items-center col-md-6"><span class="material-icons mr-2">today</span>Published On: &nbsp;<strong>{{ $post->publish_date }}</strong></div>
            <div class="d-flex align-items-center col-md-6"><span class="material-icons mr-2">person</span>Written By: &nbsp;<strong>{{ $post->writer_name }}</strong></div>
        </div>
        <div class="d-flex align-items-center my-2"><span class="material-icons mr-2">label</span>Tags: &nbsp;<strong>{{ $post->tags }}</strong></div>
        {{-- <p>{!! Str::of($post->body)->words(10, '...') !!}</p> --}}
        {{-- <a href="" class="mw-50 mx-auto btn bg-gate-alt">Read More</a> --}}
    </div>
    </a>
    @empty
    <strong>No Posts Available</strong>
    @endforelse
    <div class="mt-5">
        {{ $posts->links() }}
    </div>
</x-simple-layout>