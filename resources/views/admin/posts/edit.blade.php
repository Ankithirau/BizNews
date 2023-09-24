@extends('admin.master')

@section('title', 'Post')

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
            <!-- Small boxes (Stat box) -->
            @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            @if (session('error'))
                <div class="alert alert-danger">{{ session('error') }}</div>
            @endif
            <div class="row">
                <div class="col-md-12">
                    <!-- general form elements -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Edit Post</h3>
                        </div>

                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="{{ route('posts.update',$post->id) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('put')
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="title">Title</label>
                                    <input type="text" name="title" class="form-control" id="title"
                                        placeholder="Enter title" value="{{$post->title}}">
                                </div>
                                @error('title')
                                    <div class="text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                                <div class="form-group">
                                    <label for="short_desc">Short Description</label>
                                    <textarea class="form-control" name="short_desc" rows="3" placeholder="Enter ..." id="short_desc">{{$post->short_desc}}</textarea>
                                </div>
                                @error('short_desc')
                                    <div class="text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                                <div class="form-group">
                                    <label for="category_id">Category</label>
                                    <select class="custom-select" name="category_id" id="category_id">
                                        @foreach ($categories as $item)
                                            <option value="{{$item->id}}" @if ($post->category->id==$item->id) selected @endif>{{$item->category_name}}</option>
                                        @endforeach
                                    </select>
                                    @error('category_id')
                                        <div class="text-danger">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="subcategory_id">SubCategory</label>
                                    <select class="custom-select" id="subcategory_id" name="subcategory_id">
                                        @foreach ($subcategories as $item)
                                            <option value="{{$item->id}}" @if ($post->subcategory->id==$item->id) selected @endif>{{$item->subcategory_name}}</option>
                                        @endforeach
                                    </select>
                                    @error('category_id')
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
                                    <textarea id="summernote" name="desc" rows="10">
                                        {{$post->desc}}
                                    </textarea>
                                </div>
                                @error('desc')
                                    <div class="text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                                <div class="form-group" data-select2-id="51">
                                    <label>Tags</label>
                                    <select class="form-control select2bs4" style="width: 100%;" multiple="multiple" data-placeholder="Select a State" name="tags[]">
                                        @foreach ($tags as $item)
                                            <option value="{{$item->id}}">{{$item->tags}}</option>
                                        @endforeach
                                      </select>
                                </div>
                                <div class="form-group">
                                    <div class="icheck-primary">
                                        <input type="checkbox" name="is_featured" value="1" id="check1" @checked($post->is_featured==1)>
                                        <label for="check1">Show Post On Featured</label>
                                    </div>
                                    <div class="icheck-primary mt-3">
                                        <input type="checkbox" name="is_banner" value="1" id="check2" @checked($post->is_banner==1)>
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
        $(function () {
            // Summernote
            $('#summernote').summernote()
        });
        $('.select2bs4').select2({
            theme: 'bootstrap4'
        });
    </script>
@endpush