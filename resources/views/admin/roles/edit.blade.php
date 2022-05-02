@extends('admin.layouts.master')
@section('title', 'Admin | Laravel Sprite')
@section('heading', 'Authentication')
@section('sub_heading', 'Edit Role')
@section('page_tools')
    <a href="{{ route('admin.roles.index') }}" class="btn btn-primary">Go Back &nbsp; <i
            class="pl-2 fa fa-arrow-left"></i></a>
@endsection
@section('content')
    <div class=" bg-white shadow p-4">


        <form method="POST" class="form" action="{{ route('admin.roles.update', $role->id) }}">
            @csrf
            @method('PUT')
            <label class="form-label">Role Name</label>
            <div class="input-group mb-2">
                <span class="input-group-text">
                    <i class="fa fa-key"></i>
                </span>
                <input type="text" name="name" class="form-control  @error('name') is-invalid @enderror " placeholder="Role"
                    value="{{ $role->name }}" autocomplete="off">
                @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <div class="form-label">Select Permissions</div>
                @forelse ($permissions as $permission)
                    <label class="form-check form-switch">


                        <input
                            @foreach ($role->getPermissionNames() as $item) @if ($permission->name == $item)  checked @endif @endforeach
                            name="permissions[]" class="form-check-input" value="{{ $permission->name }}" type="checkbox">



                        <span class="form-check-label"> {{ $permission->name }}</span>
                    </label>
                @empty
                    <label class="form-check form-switch">

                        <span class="form-check-label"> No Permissions</span>
                    </label>
                @endforelse

            </div>
            <div class="input-group mb-2">
                <button class="btn btn-primary " type="submit">
                    Save
                    <i class=" fa fa-fw fa-floppy-disk"></i></button>
            </div>
        </form>

    </div>
@endsection
