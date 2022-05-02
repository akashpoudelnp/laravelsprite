@extends('admin.layouts.master')
@section('title', 'Admin | Laravel Sprite')
@section('heading', 'Authentication')
@section('sub_heading', 'Create Permission')
@section('page_tools')
    <a href="{{ route('admin.permissions.index') }}" class="btn btn-primary">Go Back &nbsp; <i
            class="pl-2 fa fa-arrow-left"></i></a>
@endsection
@section('content')
    <div class=" bg-white shadow p-4">


        <form method="POST" class="form" action="{{ route('admin.permissions.store') }}">
            @csrf
            <label class="form-label">Permission Name</label>
            <div class="input-group mb-2">
                <span class="input-group-text">
                    <i class="fa fa-key"></i>
                </span>
                <input type="text" name="name" class="form-control  @error('name') is-invalid @enderror "
                    placeholder="Permission" autocomplete="off">
                @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
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
