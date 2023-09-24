@extends('admin.master')

@section('title', 'Profile')

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
                        <li class="breadcrumb-item active">Profile</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <!-- Main content -->

    <section class="content">
          @if (session('success'))
          <div class="alert alert-success">{{ session('success') }}</div>
          @endif
          @if (session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
          @endif
        <div class="container-fluid">
            <div class="row">
              <div class="col-md-3">
                <!-- Profile Image -->
                <div class="card card-primary card-outline">
                  <div class="card-body box-profile">
                    <div class="text-center">
                      <img class="profile-user-img img-fluid img-circle" src="https://w7.pngwing.com/pngs/895/199/png-transparent-spider-man-heroes-download-with-transparent-background-free-thumbnail.png" alt="User profile picture">
                    </div>
    
                    <h3 class="profile-username text-center">{{$user->name}}</h3>
    
                    {{-- <p class="text-muted text-center">Software Engineer</p> --}}
                    <p class="text-muted text-center">{{$user->email}}</p>
    
                    <ul class="list-group list-group-unbordered mb-3">
                      <li class="list-group-item">
                        <b>Followers</b> <a class="float-right">1,322</a>
                      </li>
                      <li class="list-group-item">
                        <b>Following</b> <a class="float-right">543</a>
                      </li>
                    </ul>
    
                    <a href="#" class="btn btn-primary btn-block"><b>Follow</b></a>
                  </div>
                  <!-- /.card-body -->
                </div>
                <!-- /.card -->
    
              </div>
              <!-- /.col -->
              <div class="col-md-9">
                <div class="card">
                  <div class="card-header p-2">
                    <ul class="nav nav-pills">
                      <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Profile</a></li>
                    </ul>
                  </div><!-- /.card-header -->
                  <div class="card-body">    
                      <div class="tab-pane" id="settings">
                        <form class="form-horizontal" action="{{route('profile.update')}}" method="post">
                          @csrf
                          @method('post')
                          <div class="form-group row">
                            <label for="inputName" class="col-sm-2 col-form-label">Name</label>
                            <div class="col-sm-10">
                              <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="inputName" placeholder="Name" value="{{$user->name}}">
                              @error('name')
                              <span class="error invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                              </span>
                            @enderror
                            </div>
                          </div>
                          <div class="form-group row">
                            <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                            <div class="col-sm-10">
                              <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="inputEmail" placeholder="Email" value="{{$user->email}}">
                              @error('email')
                              <span class="error invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                              </span>
                            @enderror
                            </div>
                          </div>
                          <div class="form-group row">
                            <label for="inputExperience" class="col-sm-2 col-form-label">New Password</label>
                            <div class="col-sm-10">
                              <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" autocomplete="current-password" placeholder="{{ __('New Password') }}">
                              @error('password')
                              <span class="error invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                              </span>
                            @enderror
                            </div>
                          </div>
                          <div class="form-group row">
                            <label for="inputSkills" class="col-sm-2 col-form-label">{{ __('Confirm Password') }}</label>
                            <div class="col-sm-10">
                              <input type="password" name="password_confirmation" class="form-control" id="inputSkills" placeholder="{{ __('Confirm Password') }}">
                            </div>
                          </div>
                          <div class="form-group row">
                            <div class="offset-sm-2 col-sm-10">
                              <button type="submit" class="btn btn-danger">Submit</button>
                            </div>
                          </div>
                        </form>
                      </div>
                      <!-- /.tab-pane -->
                    </div>
                    <!-- /.tab-content -->
                  </div><!-- /.card-body -->
                </div>
                <!-- /.card -->
              </div>
              <!-- /.col -->
            </div>
            <!-- /.row -->
          </div>
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection
