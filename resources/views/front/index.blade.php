@extends('front.layout')
@section('title', $page->title)
@section('content')
    <div class="mt-10">
        {!! $page->content !!}
    </div>
@endsection
