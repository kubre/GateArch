<x-simple-layout title="{{ $post->title }}">
    <div class="my-3 row">
        <div class="col-md-4"><a href="/blog" class="btn btn-sm bg-gate">Back</a></div>
        <div class="d-flex align-items-center col-md-4"><span class="material-icons mr-2">today</span>Published On: &nbsp;<strong>{{ $post->publish_date }}</strong></div>
        <div class="d-flex align-items-center col-md-4"><span class="material-icons mr-2">person</span>Written By: &nbsp;<strong>{{ $post->writer_name }}</strong></div>
    </div>
    <hr>
    <div>{!! $post->body !!}</div>
    <hr>
    <div class="d-flex align-items-center mt-2"><span class="material-icons mr-2">label</span>Tags: &nbsp;<strong>{{ $post->tags }}</strong></div>
</x-simple-layout>