@extends('admin.layouts.master')
@section('title', 'Admin | Laravel Sprite')
@section('heading', 'Authentication')
@section('sub_heading', 'Users')
@section('scripts')
    <script>
        function deleteUser(id) {
            var send = confirm('Are you sure you want to delete user with id: ' + id);
            if (send)
                return true;
            return false;
        }
    </script>
@endsection
@section('page_tools')
    <a href="{{ route('admin.users.create') }}" class="btn btn-primary">Add New &nbsp; <i class="pl-2 fa fa-plus"></i></a>
@endsection
@section('content')
    <div class="card">
        <div class="table-responsive">
            <table class="table table-vcenter table-mobile-md card-table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Role</th>
                        <th class="w-1"></th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($users as $user)
                        <tr>
                            <td data-label="">
                                <div class="d-flex py-1 align-items-center">
                                    <div class="flex-fill">
                                        <div class="font-weight-medium">{{ $user->id }}</div>
                                    </div>
                                </div>
                            </td>
                            <td data-label="Title">
                                <div>{{ $user->name }}</div>
                            </td>
                            <td class="text-muted">
                                <div class="form-selectgroup">
                                    @forelse ($user->getRoleNames() as $role)
                                        <label class="form-selectgroup-item ">
                                            <span class="form-selectgroup-label">{{ $role }}</span>
                                        </label>
                                    @empty
                                        No Roles Assigned!
                                    @endforelse
                                </div>
                            </td>
                            <td>
                                <div class="btn-list flex-nowrap">
                                    <a href="{{ route('admin.users.edit', $user) }}"
                                        class="btn btn-light btn-sm text-primary"><i class="fa fa-pencil"></i></a>

                                    <form id="deleteUser-{{ $user->id }}"
                                        onsubmit=" return deleteUser({{ $user->id }})" method="POST"
                                        action="{{ route('admin.users.destroy', $user->id) }}">
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
                            <td colspan="4 p-2">No Users found !!</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
