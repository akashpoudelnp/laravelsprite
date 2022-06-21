@extends('admin.layouts.master')
@section('title', 'Admin | Laravel Sprite')
@section('heading', 'Posts')
@section('sub_heading', 'Viewing Post')
@section('page_tools')
    <a href="{{ route('admin.posts.index') }}" class="btn btn-primary">Go Back &nbsp; <i
            class="pl-2 fa fa-arrow-left"></i></a>
@endsection
@section('content')
    {{-- View Post --}}
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">{{ $post->title }}</h5>
            <p class="card-text">{{ $post->content }}</p>
            <p class="card-text">{{ $post->slug }}</p>
            <img src="{{ asset($post->image) }}" alt="{{ $post->title }}" class="img-fluid">
        </div>
    </div>


@endsection
