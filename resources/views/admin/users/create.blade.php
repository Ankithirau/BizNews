@extends('admin.master')

@section('title', 'Role')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0"></h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Role</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-md-12">
                    <!-- general form elements -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Create Role</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="{{ route('role.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('post')
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="role">Role</label>
                                            <input type="text" name="role" class="form-control" id="role"
                                                placeholder="Enter role">
                                        </div>
                                        @error('role')
                                            <div class="text-danger">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                        <div class="form-group">
                                            <label for="permission">Permission </label>
                                        </div>
                                        @error('permissions')
                                            <div class="text-danger">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="col-md-12">
                                        <div class="row">
                                            @foreach ($permissions as $key => $permission)
                                                <div class="col-12 col-sm-3">
                                                    <div class="card">
                                                        <div class="card-header bg-secondary">
                                                            <input class="form-check-input ml-0 check-all" type="checkbox"
                                                                id="permission-{{ $key }}"
                                                                value="{{ $key }}">
                                                            <label class="form-check-label ml-4"
                                                                id="permission-{{ $key }}">{{ Str::ucfirst(str_replace('-', ' ', $key)) }}
                                                            </label>
                                                        </div>
                                                        <ul class="list-group list-group-flush" id="check_group-{{$key}}">
                                                            @foreach ($permission as $list)
                                                                <li class="list-group-item">
                                                                    <div class="form-check">
                                                                        <input class="form-check-input input-icheck" type="checkbox"
                                                                            id="permissionCheck-{{ $key }}-{{ $list }}"
                                                                            name="permissions[]" value="{{ $key }}-{{ $list }}">
                                                                        <label class="form-check-label"
                                                                            for="permissionCheck-{{ $key }}-{{ $list }}">
                                                                            {{ $list }}
                                                                        </label>
                                                                    </div>
                                                                </li>
                                                            @endforeach
                                                        </ul>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                    <!-- /.card -->
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection