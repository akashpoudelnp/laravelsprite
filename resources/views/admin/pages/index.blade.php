@extends('admin.layouts.master')
@section('title', 'Admin | Laravel Sprite')
@section('heading', 'Articles')
@section('sub_heading', 'Pages')

@section('page_tools')
    <a href="{{ route('admin.pages.create') }}" class="btn btn-primary">Add New &nbsp; <i class="pl-2 fa fa-plus"></i></a>
@endsection
@section('content')
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Title</th>
                            <th>Slug</th>
                            <th>Published</th>
                            <th>Created At</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pages as $page)
                            <tr>
                                <td>{{ $page->id }}</td>
                                <td>{{ $page->title }}</td>
                                <td>{{ $page->slug }}</td>
                                <td>
                                    @if ($page->is_published)
                                        <i class="fa fa-check text-success"></i>
                                    @else
                                        <i class="fa fa-times text-danger"></i>
                                    @endif
                                </td>
                                <td>{{ $page->created_at }}</td>
                                <td>
                                    <a href="{{ route('admin.pages.edit', $page->id) }}" class="btn btn-primary">Edit
                                        &nbsp; <i class="pl-2 fa fa-edit"></i></a>
                                    <a href="{{ route('admin.pages.show', $page->id) }}" class="btn btn-primary">Show
                                        &nbsp; <i class="pl-2 fa fa-eye"></i></a>
                                    <form onclick="return confirm('Are you sure you want to delete this page?');"
                                        action="{{ route('admin.pages.destroy', $page->id) }}" method="POST"
                                        class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Delete &nbsp; <i
                                                class="pl-2 fa fa-trash"></i></button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="float-right">
                    {{ $pages->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
