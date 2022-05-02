@extends('admin.layouts.master')
@section('title', 'Admin | Laravel Sprite')
@section('heading', 'Authentication')
@section('sub_heading', 'Create User')
@section('page_tools')
    <a href="{{ route('admin.users.index') }}" class="btn btn-primary">Go Back &nbsp; <i
            class="pl-2 fa fa-arrow-left"></i></a>
@endsection
@section('content')
    <div class=" bg-white shadow p-4">


        <form method="POST" class="form" action="{{ route('admin.users.store') }}">
            @csrf
            <label class="form-label">Name</label>
            <div class="input-group mb-2">
                <span class="input-group-text">
                    <i class="fa fa-user"></i>
                </span>
                <input type="text" name="name" class="form-control  @error('name') is-invalid @enderror " placeholder="Mario"
                    autocomplete="off">
                @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <label class="form-label">Email</label>
            <div class="input-group mb-2">
                <span class="input-group-text">
                    @
                </span>
                <input type="email" name="email" class="form-control @error('email') is-invalid @enderror "
                    placeholder="youremail@xyz.com" autocomplete="off">

                @error('email')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <label class="form-label">Password</label>
            <div class="input-group mb-4">
                <span class="input-group-text">
                    <i class="fa fa-eye"></i>
                </span>
                <input type="password" name="password" class="form-control @error('password') is-invalid @enderror "
                    placeholder="********" autocomplete="off">
                @error('password')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <div class="form-label">Select Roles</div>
                <div class="d-flex flex-row">
                    @forelse ($roles as $role)
                        <label class="form-check form-switch m-2">
                            <input name="roles[]" class="form-check-input" value="{{ $role->name }}" type="checkbox">

                            <span class="form-check-label"> {{ $role->name }}</span>
                        </label>
                    @empty
                        <label class="form-check form-switch">

                            <span class="form-check-label"> No Role</span>
                        </label>
                    @endforelse
                </div>

            </div>
            <div class="input-group mb-2">
                <button name="save" value="rd" class="btn btn-primary " type="submit">
                    Save
                    <i class=" fa fa-fw fa-floppy-disk"></i></button>
                <button name="save" value="cn" class="btn btn-success mx-2 " type="submit">
                    Create Next
                    <i class=" fa fa-fw fa-floppy-disk"></i></button>
            </div>
        </form>

    </div>
@endsection
