@extends('admin.layouts.master')
@section('title', 'Admin | Laravel Sprite')
@section('heading', 'Authorization')
@section('sub_heading', 'Permissions')
@section('scripts')
    <script>
        function deletePermission(id) {
            var send = confirm('Are you sure you want to delete permission with id: ' + id);
            if (send)
                return true;
            return false;
        }
    </script>
@endsection
@section('page_tools')
    <a href="{{ route('admin.permissions.create') }}" class="btn btn-primary">Add New &nbsp; <i
            class="pl-2 fa fa-plus"></i></a>
@endsection
@section('content')
    <div class="card">
        <div class="table-responsive">
            <table class="table table-vcenter  card-table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th class="w-1"></th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($permissions as $permission)
                        <tr>
                            <td data-label="">
                                <div class="d-flex py-1 align-items-center">
                                    <div class="flex-fill">
                                        <div class="font-weight-medium">{{ $permission->id }}</div>
                                    </div>
                                </div>
                            </td>
                            <td data-label="Title">
                                <div>{{ $permission->name }}</div>
                            </td>

                            <td>
                                <div class="btn-list flex-nowrap">
                                    <a href="{{ route('admin.permissions.edit', $permission) }}"
                                        class="btn btn-light btn-sm text-primary"><i class="fa fa-pencil"></i></a>

                                    <form id="deletePermission-{{ $permission->id }}"
                                        onsubmit=" return deletePermission({{ $permission->id }})" method="POST"
                                        action="{{ route('admin.permissions.destroy', $permission->id) }}">
                                        @csrf
                                        @method('DELETE')
                                        <button href="" class="btn btn-light btn-sm text-primary"> <i
                                                class="fa fa-trash"></i></button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4 p-2">No Permissions found !!</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
