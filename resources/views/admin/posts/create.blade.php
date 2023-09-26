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
                    <li class="breadcrumb-item active">Post</li>
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
                <a href="{{route('posts.index')}}" class="btn btn-primary">Back</a>
            </div>
        </div>
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-md-12">
                <!-- general form elements -->
                <div class="card card-secondary">
                    <div class="card-header">
                        <h3 class="card-title">Create Post</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form action="{{ route('posts.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('post')
                        <div class="card-body">
                            <div class="form-group">
                                <label for="title">Title</label>
                                <input type="text" name="title" class="form-control" id="title"
                                    placeholder="Enter title" value="{{old('title')}}">
                            </div>
                            @error('title')
                            <div class="text-danger">
                                {{ $message }}
                            </div>
                            @enderror
                            <div class="form-group">
                                <label for="short_desc">Short Description</label>
                                <textarea class="form-control" name="short_desc" rows="3" placeholder="Enter ..."
                                    id="short_desc">{{old('short_desc')}}</textarea>
                            </div>
                            @error('short_desc')
                            <div class="text-danger">
                                {{ $message }}
                            </div>
                            @enderror
                            <div class="form-group">
                                <label for="category">Category</label>
                                <select class="custom-select" name="category_id" id="category"
                                    data-url="{{route('category.relative')}}">
                                    <option value="" selected>Select Category</option>
                                    @foreach ($categories as $item)
                                    <option value="{{ $item->id }}" @selected(old('short_desc')==$item->id)>{{ $item->category_name }}</option>
                                    @endforeach
                                </select>
                                @error('category_id')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="subcategory">SubCategory</label>
                                <select class="custom-select" id="subcategory" name="subcategory_id">
                                    <option value="" selected>Select Subcategory</option>
                                </select>
                                @error('subcategory_id')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="image">Image</label>
                                <div class="custom-file">
                                    <input type="file" name="image" class="custom-file-input" id="image">
                                    <label class="custom-file-label" for="image">Choose file</label>
                                </div>
                            </div>
                            @error('image')
                            <div class="text-danger">
                                {{ $message }}
                            </div>
                            @enderror

                            <div class="form-group">
                                <label for="exampleInputEmail1">Description</label>
                                <textarea id="summernote" name="desc" rows="10">{{old('desc')}}</textarea>
                            </div>
                            @error('desc')
                            <div class="text-danger">
                                {{ $message }}
                            </div>
                            @enderror
                            <div class="form-group" data-select2-id="51">
                                <label>Tags</label>
                                <select class="form-control select2bs4" style="width: 100%;" multiple="multiple"
                                    data-placeholder="Select a State" name="tags[]">
                                    @foreach ($tags as $item)
                                    <option value="{{ $item->id }}">{{ $item->tags }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <div class="icheck-primary">
                                    <input type="checkbox" name="is_featured" value="1" id="check1">
                                    <label for="check1">Show Post On Featured</label>
                                </div>
                                <div class="icheck-primary mt-3">
                                    <input type="checkbox" name="is_banner" value="1" id="check2">
                                    <label for="check2">Show Post On Banner</label>
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

@push('scripts')
<script>
    $(function() {
            // Summernote
            $('#summernote').summernote({
                'height' :200
            })
        });
        $('.select2bs4').select2({
            theme: 'bootstrap4'
        });
</script>
@endpush