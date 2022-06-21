@extends('admin.layouts.master')
@section('title', 'Admin | Laravel Sprite')
@section('heading', 'Notifications')
@section('sub_heading', 'Create Notification')
@section('page_tools')
    <a href="{{ route('admin.notifications.index') }}" class="btn btn-primary">Go Back &nbsp; <i
            class="pl-2 fa fa-arrow-left"></i></a>
@endsection
@section('content')
    <div class=" bg-white shadow p-4">
        <form method="POST" class="form" action="{{ route('admin.notifications.store') }}">
            @csrf
            <div class="input-group mb-3">
                <span class="input-group-text">
                    <b>Notification Type</b>
                </span>
                <select class="form-select" name="type" id="">
                    <option value="warning">Warning</option>
                    <option value="info">Informational</option>
                    <option value="general">General</option>
                </select>
                @error('type')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text">
                    <b>Notification Message</b>
                </span>
                <input type="text" name="data" class="form-control  @error('data') is-invalid @enderror "
                    placeholder="Message" autocomplete="off">
                @error('data')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group mb-3">
                <label for="users" class="form-label">Select Users to Notify</label>
                <select class="form-select basic-select2" name="users[]" id="users" multiple>
                    @foreach ($users as $user)
                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                    @endforeach
                </select>
                @error('users')
                    <div class=" text-danger fs-4">User is required</div>
                @enderror

            </div>
            <div class="input-group mb-2 d-flex justify-content-end">
                <button name="save" value="rd" class="btn btn-primary " type="submit">
                    Save
                    <i class=" fa fa-fw fa-bell"></i>
                </button>
            </div>
        </form>

    </div>
@endsection
