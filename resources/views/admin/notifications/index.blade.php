@extends('admin.layouts.master')
@section('title', 'Admin | Laravel Sprite')
@section('heading', 'Notifications')
@section('sub_heading', 'Viewing All Notifications')
@section('scripts')
    <script>
        function deleteNotification(id) {
            var send = confirm('Are you sure you want to delete notification with id: ' + id);
            if (send)
                return true;
            return false;
        }
    </script>
@endsection
@section('page_tools')
    <a href="{{ route('admin.notifications.create') }}" class="btn btn-primary">Add New &nbsp; <i
            class="pl-2 fa fa-plus"></i></a>
@endsection
@section('content')
    <div class="card">
        <div class="table-responsive">
            <table class="table table-vcenter  card-table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Type</th>
                        <th>Data</th>
                        <th>Users</th>
                        <th class="w-1"></th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($notifications as $notification)
                        <tr>
                            <td data-label="">
                                <div class="d-flex py-1 align-items-center">
                                    <div class="flex-fill">
                                        <div class="font-weight-medium">{{ $notification->id }}</div>
                                    </div>
                                </div>
                            </td>
                            <td data-label="">
                                <div class="d-flex py-1 align-items-center">
                                    <div class="flex-fill">
                                        <div class="font-weight-medium">{{ $notification->type }}</div>
                                    </div>
                                </div>
                            </td>
                            <td data-label="">
                                <div class="d-flex py-1 align-items-center">
                                    <div class="flex-fill">
                                        <div class="font-weight-medium">{{ $notification->data }}</div>
                                    </div>
                                </div>
                            </td>
                            <td data-label="">
                                <div class="d-flex py-1 align-items-center">
                                    <div class="flex-fill">
                                        <div class="font-weight-medium">
                                            @foreach ($notification->users as $user)
                                                {{ $user->name . ',' }}
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="btn-list flex-nowrap">
                                    <a href="{{ route('admin.notifications.edit', $notification) }}"
                                        class="btn btn-light btn-sm text-primary"><i class="fa fa-pencil"></i></a>

                                    <form id="deleteNotification-{{ $notification->id }}"
                                        onsubmit=" return deleteNotification({{ $notification->id }})" method="POST"
                                        action="{{ route('admin.notifications.destroy', $notification->id) }}">
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
                            <td colspan="4 p-2">No Notifications found !!</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
