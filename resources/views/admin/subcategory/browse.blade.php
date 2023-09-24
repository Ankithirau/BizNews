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
                    <div class="card">
                        <div class="card-header">
                            <div class="row">
                                <div class="col-sm-11">
                                    <div class="card-title">
                                        Subcategory List
                                    </div>
                                </div>
                                <div class="col-sm-1">
                                    <a href="{{route('subcategory.create')}}" class="btn btn-primary">+ Add</a>
                                </div>
                            </div>
                            <div class="card-title right">

                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th style="width: 10px">#</th>
                                        <th>Name</th>
                                        <th>Category</th>
                                        <th>Slug</th>
                                        <th>Status</th>
                                        <th style="width: 250px">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                  @php
                                      $i=1;
                                  @endphp
                                    @if (!empty($subcategories))
                                    @foreach ($subcategories as $item)
                                        <tr>
                                            <td>{{$i++}}</td>
                                            <td>{{$item->subcategory_name}}</td>
                                            <td>{{$item->category->category_name}}</td>
                                            <td>{{$item->subcategory_slug}}</td>
                                            <td>{{$item->status==1?'Active':'Disable'}}</td>
                                            <td>
                                              <a href="{{route('subcategory.edit',$item->id)}}" class="btn btn-sm btn-success" target="_self" rel="noopener noreferrer"> <i class="far fa-edit"></i>&nbsp; Edit</a>
                                              <a class="btn btn-sm btn-danger" target="_self" rel="noopener noreferrer" onclick="return confirm('are you wanted to delete this record')" href="{{route('subcategory.destroy',$item->id)}}"><i class="fas fa-trash-alt"></i>&nbsp; Delete</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    @endif

                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer clearfix">
                            <ul class="pagination pagination-sm m-0 float-right">
                                <li class="page-item"><a class="page-link" href="#">&laquo;</a></li>
                                <li class="page-item"><a class="page-link" href="#">1</a></li>
                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item"><a class="page-link" href="#">&raquo;</a></li>
                            </ul>
                        </div>
                    </div>
                    <!-- /.card -->
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection
