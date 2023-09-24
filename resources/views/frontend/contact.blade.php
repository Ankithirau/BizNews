@extends('frontend.app')

@section('content')

<!-- Topbar Start -->
@include('frontend.layouts.topbar')
<!-- Topbar End -->

<!-- Navbar Start -->
@include('frontend.layouts.navbar')

<!-- Contact Start -->
<div class="container-fluid mt-5 pt-3">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="section-title mb-0">
                    <h4 class="m-0 text-uppercase font-weight-bold">Contact Us For Any Queries</h4>
                </div>
                <div class="bg-white border border-top-0 p-4 mb-3">
                    <div class="mb-4">
                        <div class="mb-3">
                            <div class="d-flex align-items-center mb-2">
                                <i class="fa fa-map-marker-alt text-primary mr-2"></i>
                                <h6 class="font-weight-bold mb-0">Our Office</h6>
                            </div>
                            <p class="m-0">123 Street, New York, USA</p>
                        </div>
                        <div class="mb-3">
                            <div class="d-flex align-items-center mb-2">
                                <i class="fa fa-envelope-open text-primary mr-2"></i>
                                <h6 class="font-weight-bold mb-0">Email Us</h6>
                            </div>
                            <p class="m-0">info@example.com</p>
                        </div>
                        <div class="mb-3">
                            <div class="d-flex align-items-center mb-2">
                                <i class="fa fa-phone-alt text-primary mr-2"></i>
                                <h6 class="font-weight-bold mb-0">Call Us</h6>
                            </div>
                            <p class="m-0">+012 345 6789</p>
                        </div>
                    </div>
                    <h6 class="text-uppercase font-weight-bold mb-3">Contact Us</h6>
                    @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @elseif(session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif
                    <form action="{{route('contact.store')}}" method="post">
                        @csrf
                        @method('post')
                        <div class="form-row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" class="form-control p-4" placeholder="Your Name"
                                         name="name"/>
                                    @error('name')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="email" class="form-control p-4" placeholder="Your Email"
                                         name="email"/>
                                    @error('email')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control p-4" placeholder="Subject"  name="subject"/>
                            @error('subject')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <textarea class="form-control" rows="4" placeholder="Message"  name="message"></textarea>
                            @error('message')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div>
                            <button class="btn btn-primary font-weight-semi-bold px-4" style="height: 50px;"
                                type="submit">Send Message</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-lg-4">
                <!-- Newsletter Start -->
                <div class="mb-3">
                    <div class="section-title mb-0">
                        <h4 class="m-0 text-uppercase font-weight-bold">Newsletter</h4>
                    </div>
                    <div class="bg-white text-center border border-top-0 p-3">
                        <p>Aliqu justo et labore at eirmod justo sea erat diam dolor diam vero kasd</p>
                        <div class="input-group mb-2" style="width: 100%;">
                            <input type="text" class="form-control form-control-lg" placeholder="Your Email">
                            <div class="input-group-append">
                                <button class="btn btn-primary font-weight-bold px-3">Sign Up</button>
                            </div>
                        </div>
                        <small>Lorem ipsum dolor sit amet elit</small>
                    </div>
                </div>
                <!-- Newsletter End -->
            </div>
        </div>
    </div>
</div>
    
<!-- Contact End -->
<!-- Footer Start -->
@include('frontend.layouts.footer')
<!-- Footer End -->    
@endsection
