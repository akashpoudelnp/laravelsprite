@extends('admin.layouts.master')
@section('title', 'Admin | Laravel Sprite')
@section('heading', 'Laravel Sprite')
@section('sub_heading', 'Dashboard')
@section('page_tools')
    {{-- <button class="btn btn-primary">Add New &nbsp; <i class="pl-2 fa fa-plus"></i></button> --}}
@endsection
@section('content')
    <div class="row row-deck row-cards">
        <div class="col-sm-6 col-lg-3">
            @foreach ($dashcards as $item)
                <x-info-cards :name="$item['name']" :count="$item['count']" :color="$item['color']" :icon="$item['icon']" />
            @endforeach

        </div>
    </div>
@endsection
