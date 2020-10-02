<x-simple-layout title="Blog">

    <x-slot name="styles">
        <style>
             @media only screen and (max-width: 1280px) {
                .body img, .body iframe, .body table {
                    width: 100% !important;
                }

                .body img {
                    height: auto;
                }
            }
        </style>
    </x-slot>

    <h2 class="text-center">{{ $post->title }}</h2>
    <div class="my-3 row">
        <div class="d-flex align-items-center col-6 col-lg-4 my-2 my-lg-0"><span class="material-icons mr-2">today</span><strong>{{ $post->publish_date }}</strong></div>
        <div class="d-flex align-items-center col-6 col-lg-4"><span class="material-icons mr-2">person</span><strong>{{ $post->writer_name }}</strong></div>
        <div class="col-lg-4"><a href="/blog" class="btn btn-sm bg-gate w-100 m-md-auto">All Posts</a></div>
    </div>
    <hr>
    <div class="body">{!! $post->body !!}</div>
    <hr>
    <div class="d-flex align-items-center mt-2"><span class="material-icons mr-2">label</span><strong>{{ $post->tags }}</strong></div>
</x-simple-layout>