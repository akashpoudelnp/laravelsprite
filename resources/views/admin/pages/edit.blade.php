{{-- Extend admin master blade --}}
@extends('admin.layouts.master')
@section('title', 'Admin | Laravel Sprite')
@section('heading', 'Pages')
@section('sub_heading', 'Edit Page')

{{-- Page tools --}}
@section('page_tools')
    <a href="{{ route('admin.pages.index') }}" class="btn btn-primary">Go Back &nbsp; <i
            class="pl-2 fa fa-arrow-left"></i></a>
@endsection

{{-- Page content --}}
@section('content')
    {{-- Page edit form --}}

    <div class="card">
        <div class="card-body">
            {{-- Form to create new page --}}
            <form action="{{ route('admin.pages.update', $page->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" class="form-control" id="title" name="title" placeholder="Title"
                        value="{{ old('title', $page->title) }}">
                    @error('title')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="content">Content</label>
                    <textarea class="form-control" id="content" name="content" rows="3">{{ old('content', $page->content) }}</textarea>
                    @error('content')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                {{-- Slug --}}
                <div class="form-group">
                    <label for="slug">Slug</label>
                    <input type="text" class="form-control" id="slug" name="slug" placeholder="Slug"
                        value="{{ old('slug', $page->slug) }}">
                    @error('slug')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group mt-3">
                    <label class="form-check form-switch">
                        <input name="is_published" class="form-check-input" value="1" @checked($page->is_published)
                            type="checkbox">
                        <span class="form-check-label"> Publish</span>
                    </label>
                </div>
                <div class="mt-4">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>

    {{-- End of page edit form --}}
@endsection
@push('js')
    <script src="{{ asset('js/tinymce/tinymce.min.js') }}" referrerpolicy="origin"></script>
    <script>
        tinymce.init({
            selector: 'textarea#content', // Replace this CSS selector to match the placeholder element for TinyMCE
            plugins: 'code table lists image',
            toolbar: 'undo redo | blocks | bold italic | alignleft aligncenter alignright | indent outdent | bullist numlist | code | table | image'
        });
    </script>
@endpush
