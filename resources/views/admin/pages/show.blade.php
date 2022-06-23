@extends('admin.layouts.master')
@section('title', 'Admin | Laravel Sprite')
@section('heading', 'Pages')
@section('sub_heading', 'Viewing Page')
@section('page_tools')
    <a href="{{ route('admin.pages.index') }}" class="btn btn-primary">Go Back &nbsp; <i
            class="pl-2 fa fa-arrow-left"></i></a>
@endsection
@section('content')
    {{-- View Page --}}
    <div class="card">
        <div class="card-header">
            <h5 class="card-title">{{ $page->title }}</h5>
        </div>
        <div class="card-body border m-2">
            {!! $page->content !!}
        </div>
    </div>


@endsection
