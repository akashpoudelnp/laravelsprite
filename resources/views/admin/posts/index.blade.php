@extends('admin.layouts.master')
@section('title', 'Admin | Laravel Sprite')
@section('heading', 'Articles')
@section('sub_heading', 'Posts')

@section('page_tools')
    <a href="{{ route('admin.posts.create') }}" class="btn btn-primary">Add New &nbsp; <i class="pl-2 fa fa-plus"></i></a>
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
                            <th>Author</th>
                            <th>Created At</th>
                            <th>Updated At</th>
                            <th>On Facebook</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($posts as $post)
                            <tr>
                                <td>{{ $post->id }}</td>
                                <td>{{ $post->title }}</td>
                                <td>{{ $post->user->name }}</td>
                                <td>{{ $post->created_at }}</td>
                                <td>{{ $post->updated_at }}</td>
                                <td>
                                    @isset($post->fb_post_id)
                                        <i class="fa fa-check text-success"></i>
                                        <a class="link"
                                            href="https://www.facebook.com/{{ $post->fb_post_id }}">View</a>
                                    @else
                                        <i class="fa fa-times text-danger"></i>
                                    @endisset
                                </td>
                                <td>
                                    <a href="{{ route('admin.posts.edit', $post->id) }}" class="btn btn-primary">Edit
                                        &nbsp; <i class="pl-2 fa fa-edit"></i></a>
                                    <a href="{{ route('admin.posts.show', $post->id) }}" class="btn btn-primary">Show
                                        &nbsp; <i class="pl-2 fa fa-eye"></i></a>
                                    <form onclick="return confirm('Are you sure you want to delete this post?');"
                                        action="{{ route('admin.posts.destroy', $post->id) }}" method="POST"
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
                    {{ $posts->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
