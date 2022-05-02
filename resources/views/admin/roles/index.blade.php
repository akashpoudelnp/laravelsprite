@extends('admin.layouts.master')
@section('title', 'Admin | Laravel Sprite')
@section('heading', 'Authorization')
@section('sub_heading', 'Roles')
@section('scripts')
    <script>
        function deleteRole(id) {
            var send = confirm('Are you sure you want to delete role with id: ' + id);
            if (send)
                return true;
            return false;
        }
    </script>
@endsection
@section('page_tools')
    <a href="{{ route('admin.roles.create') }}" class="btn btn-primary">Add New &nbsp; <i class="pl-2 fa fa-plus"></i></a>
@endsection
@section('content')
    <div class="card">
        <div class="table-responsive">
            <table class="table table-vcenter  card-table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Permissions</th>
                        <th class="w-1"></th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($roles as $role)
                        <tr>
                            <td data-label="">
                                <div class="d-flex py-1 align-items-center">
                                    <div class="flex-fill">
                                        <div class="font-weight-medium">{{ $role->id }}</div>
                                    </div>
                                </div>
                            </td>
                            <td data-label="Title">
                                <div>{{ $role->name }}</div>
                            </td>
                            <td class="text-muted">
                                <div class="form-selectgroup">
                                    @forelse ($role->getPermissionNames() as $permission)
                                        <label class="form-selectgroup-item">
                                            <span class="form-selectgroup-label">{{ $permission }}</span>
                                        </label>

                                    @empty
                                        <label class="form-selectgroup-item">
                                            <span class="form-selectgroup-label">No Permissions</span>
                                        </label>
                                    @endforelse
                                </div>
                            </td>
                            <td>
                                <div class="btn-list flex-nowrap">
                                    <a href="{{ route('admin.roles.edit', $role) }}"
                                        class="btn btn-light btn-sm text-primary"><i class="fa fa-pencil"></i></a>

                                    <form id="deleteRole-{{ $role->id }}"
                                        onsubmit=" return deleteRole({{ $role->id }})" method="POST"
                                        action="{{ route('admin.roles.destroy', $role->id) }}">
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
                            <td colspan="4 p-2">No Roles found !!</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
