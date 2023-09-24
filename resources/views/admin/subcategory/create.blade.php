@extends('admin.master')

@section('title', Str::ucfirst($is_page))

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
                        <li class="breadcrumb-item active">Subcategory</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row mb-3">
                <div class="col-sm-11"></div>
                <div class="col-sm-1">
                    <a href="{{route('subcategory.index')}}" class="btn btn-primary">Back</a>
                </div>
            </div>
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-md-12">
                    <!-- general form elements -->
                    <div class="card card-secondary">
                        <div class="card-header">
                            <h3 class="card-title">Create Subcategory</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="{{ route('subcategory.store') }}" method="post">
                            @csrf
                            @method('post')
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Name</label>
                                    <input type="text" name="subcategory_name" class="form-control"
                                        id="exampleInputEmail1" placeholder="Enter Category name">
                                </div>
                                @error('subcategory_name')
                                    <div class="text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                                <div class="form-group">
                                    <label>Category</label>
                                    <select class="custom-select" name="category_id">
                                        <option value="" selected>Select Category</option>
                                        @foreach ($category as $item)
                                            <option value="{{$item->id}}">{{$item->category_name}}</option>
                                        @endforeach
                                    </select>
                                @error('category_id')
                                    <div class="text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
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
