@extends('admin.layouts.master')
@section('title', 'Admin | Laravel Sprite')
@section('heading', 'Posts')
@section('sub_heading', 'Create Posts')
@section('page_tools')
    <a href="{{ route('admin.posts.index') }}" class="btn btn-primary">Go Back &nbsp; <i
            class="pl-2 fa fa-arrow-left"></i></a>
@endsection
@section('content')
    <div class="card">
        <div class="card-body" x-data="{ title: '' }">
            {{-- Form to create new post --}}
            <form action="{{ route('admin.posts.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" class="form-control" x-model="title" id="title" name="title" placeholder="Title">
                    @error('title')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="content">Content</label>
                    <textarea class="form-control" id="content" name="content" rows="3"></textarea>
                    @error('content')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                {{-- Slug --}}
                <div class="form-group">
                    <label for="slug">Slug</label>
                    <input type="text" :value="title.replace(/ /g, '-')" class="form-control" id="slug" name="slug"
                        placeholder="Slug">
                    @error('slug')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                {{-- Image upload --}}
                <div class="form-group">
                    <label for="image">Image</label>
                    <input type="file" class="form-control" id="image" name="image">
                    @error('image')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group mt-3">
                    <label class="form-check form-switch">
                        <input name="on_facebook" class="form-check-input" value="1" type="checkbox">
                        <span class="form-check-label"> Post on Facebook</span>
                    </label>
                </div>
                <div class="mt-4">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>

        </div>
    </div>
@endsection
