@extends('frontend.master')
@section('title')
    Home | Senapally High School
@endsection
@section('favicons')
@foreach($favicons as $favicon)
{{ asset('public/favicons/'.$favicon->photo) }}
@endforeach
@endsection

@section('logo')
@foreach($logos as $logo)
{{ $logo->photo }}
@endforeach
@endsection

@section('contact-phone')
@foreach($contacts as $contact)
{{ $contact->phone }}
@endforeach
@endsection

@section('contact-email')
@foreach($contacts as $contact)
{{ $contact->email }}
@endforeach
@endsection

@section('contact-address')
@foreach($contacts as $contact)
{{ $contact->address }}
@endforeach
@endsection

@section('mainContent')
	<!-- ##### Hero Area Start ##### -->
	<section class="hero-area">
        <div class="hero-slides owl-carousel">
            <!-- Single Hero Slide -->
            @foreach($sliders as $slider)
                <div class="single-hero-slide bg-img" style="background-image: url( {{ asset('public/sliders/'.$slider->photo) }} );">
                    <div class="container h-100">
                        <div class="row h-100 align-items-center">
                            <div class="col-12">
                                <div class="hero-slides-content">
                                    <h2 data-animation="fadeInUp" data-delay="400ms" style="color: #28a745;">{{ $slider->title }}</h2>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </section>
    <!-- ##### Hero Area End ##### -->

    <!-- ##### Top Feature Area Start ##### -->
    <div class="top-features-area wow fadeInUp" data-wow-delay="300ms">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="features-content">
                        <div class="row no-gutters">
                            <!-- Single Top Features -->
                            <div class="col-12 col-md-4">
                                <div class="single-top-features d-flex align-items-center justify-content-center">
                                    <i class="icon-agenda-1"></i>
                                    <a href="{{ url('./courses') }}"><h5>Online Courses</h5></a>
                                </div>
                            </div>
                            <!-- Single Top Features -->
                            <div class="col-12 col-md-4">
                                <div class="single-top-features d-flex align-items-center justify-content-center">
                                    <i class="icon-assistance"></i>
                                    <a href="{{ url('./all-teachers') }}"><h5>Amazing Teachers</h5></a>
                                </div>
                            </div>
                            <!-- Single Top Features -->
                            <div class="col-12 col-md-4">
                                <div class="single-top-features d-flex align-items-center justify-content-center">
                                    <i class="icon-telephone-3"></i>
                                    <a href="{{ url('./all-notice') }}"><h5>Notices</h5></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ##### Top Feature Area End ##### -->
    <!-- ##### Course Area Start ##### -->
    <div class="academy-courses-area section-padding-100-0">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-8 col-sm-12">
                    <div class="row">
                        <!-- Single Course Area -->
                        <div class="col-12 col-sm-6 col-lg-6">
                            <div class="single-course-area d-flex align-items-center mb-100 wow fadeInUp" data-wow-delay="300ms">
                                <div class="course-icon">
                                    <i class="icon-id-card"></i>
                                </div>
                                <div class="course-content">
                                    <h4>Business School</h4>
                                    <p>Cras vitae turpis lacinia, lacinia la cus non, fermentum nisi.</p>
                                </div>
                            </div>
                        </div>
                        <!-- Single Course Area -->
                        <div class="col-12 col-sm-6 col-lg-6">
                            <div class="single-course-area d-flex align-items-center mb-100 wow fadeInUp" data-wow-delay="400ms">
                                <div class="course-icon">
                                    <i class="icon-worldwide"></i>
                                </div>
                                <div class="course-content">
                                    <h4>Marketing</h4>
                                    <p>Lacinia, lacinia la cus non, fermen tum nisi.</p>
                                </div>
                            </div>
                        </div>
                        <!-- Single Course Area -->
                        <div class="col-12 col-sm-6 col-lg-6">
                            <div class="single-course-area d-flex align-items-center mb-100 wow fadeInUp" data-wow-delay="500ms">
                                <div class="course-icon">
                                    <i class="icon-map"></i>
                                </div>
                                <div class="course-content">
                                    <h4>Photography</h4>
                                    <p>Cras vitae turpis lacinia, lacinia la cus non, fermentum nisi.</p>
                                </div>
                            </div>
                        </div>
                        <!-- Single Course Area -->
                        <div class="col-12 col-sm-6 col-lg-6">
                            <div class="single-course-area d-flex align-items-center mb-100 wow fadeInUp" data-wow-delay="600ms">
                                <div class="course-icon">
                                    <i class="icon-like"></i>
                                </div>
                                <div class="course-content">
                                    <h4>Social Media</h4>
                                    <p>Cras vitae turpis lacinia, lacinia la cus non, fermentum nisi.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-12">
                    <div class="card" style="width: 100%;">
                      <img class="card-img-top" style="max-height: 150px;" src="{{ asset('public/frontend') }}/img/bg-img/gallery1.jpg" alt="Head Master">
                      <div class="card-body">
                        <h5 class="card-title">Head Master</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content. Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                      </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ##### Course Area End ##### -->

    <!-- ##### Testimonials Area Start ##### -->
    <div class="testimonials-area section-padding-100 bg-img bg-overlay" style="background-image: url(img/bg-img/bg-2.jpg);">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-heading text-center mx-auto white wow fadeInUp" data-wow-delay="300ms">
                        <span>our testimonials</span>
                        <h3>See what our satisfied customers are saying about us</h3>
                    </div>
                </div>
            </div>
            <div class="row">
                <!-- Single Testimonials Area -->
                <div class="col-12 col-md-6">
                    <div class="single-testimonial-area mb-100 d-flex wow fadeInUp" data-wow-delay="400ms">
                        <div class="testimonial-thumb">
                            <img src="{{ asset('public/frontend') }}/img/bg-img/t1.jpg" alt="">
                        </div>
                        <div class="testimonial-content">
                            <h5>Great teachers</h5>
                            <p>Etiam nec odio vestibulum est mattis effic iturut magna. Pellentesque sit amet tellus blandit. Etiam nec odio vestibulum est mattis effic iturut magna. Pellentesque sit am et tellus blandit. Etiam nec odio vestibul. Etiam nec odio vestibulum est mat tis effic iturut magna.</p>
                            <h6><span>Maria Smith,</span> Student</h6>
                        </div>
                    </div>
                </div>
                <!-- Single Testimonials Area -->
                <div class="col-12 col-md-6">
                    <div class="single-testimonial-area mb-100 d-flex wow fadeInUp" data-wow-delay="500ms">
                        <div class="testimonial-thumb">
                            <img src="{{ asset('public/frontend') }}/img/bg-img/t2.jpg" alt="">
                        </div>
                        <div class="testimonial-content">
                            <h5>Easy and user friendly courses</h5>
                            <p>Retiam nec odio vestibulum est mattis effic iturut magna. Pellentesque sit amet tellus blandit. Etiam nec odio vestibulum est mattis effic iturut magna. Pellentesque sit am et tellus blandit. Etiam nec odio vestibul.</p>
                            <h6><span>Shawn Gaines,</span> Student</h6>
                        </div>
                    </div>
                </div>
                <!-- Single Testimonials Area -->
                <div class="col-12 col-md-6">
                    <div class="single-testimonial-area mb-100 d-flex wow fadeInUp" data-wow-delay="600ms">
                        <div class="testimonial-thumb">
                            <img src="{{ asset('public/frontend') }}/img/bg-img/t3.jpg" alt="">
                        </div>
                        <div class="testimonial-content">
                            <h5>I just love the courses here</h5>
                            <p>Nec odio vestibulum est mattis effic iturut magna. Pellentesque sit am et tellus blandit. Etiam nec odio vestibul. Etiam nec odio vestibulum est mat tis effic iturut magna. Pellentesque sit amet tellus blandit. Etiam nec odio ves tibul.</p>
                            <h6><span>Ross Cooper,</span> Student</h6>
                        </div>
                    </div>
                </div>
                <!-- Single Testimonials Area -->
                <div class="col-12 col-md-6">
                    <div class="single-testimonial-area mb-100 d-flex wow fadeInUp" data-wow-delay="700ms">
                        <div class="testimonial-thumb">
                            <img src="{{ asset('public/frontend') }}/img/bg-img/t4.jpg" alt="">
                        </div>
                        <div class="testimonial-content">
                            <h5>One good academy</h5>
                            <p>Vestibulum est mattis effic iturut magna. Pellentesque sit am et tellus blandit. Etiam nec odio vestibul. Etiam nec odio vestibu lum est mat tis effic iturut magna. Pellentesque sit amet tellus blandit. Etiam nec odio ves tibul. Etiam nec odio vestibulum est mat tis effic iturut magnaNec odio vestibulum est mattis effic iturut magna.</p>
                            <h6><span>James Williams,</span> Student</h6>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="load-more-btn text-center wow fadeInUp" data-wow-delay="800ms">
                        <a href="#" class="btn academy-btn">See More</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ##### Testimonials Area End ##### -->

    <!-- ##### Top Popular Courses Area Start ##### -->
    <div class="top-popular-courses-area section-padding-100-70">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-heading text-center mx-auto wow fadeInUp" data-wow-delay="300ms">
                        <h3>The Best - Theachers</h3>
                    </div>
                </div>
            </div>
            <div class="row">
               
                <!-- Single Teacher Starts -->
                @foreach($teachers as $teacher)
                    <div class="col-12 col-lg-6">
                        <div class="single-top-popular-course d-flex align-items-center flex-wrap mb-30 wow fadeInUp" data-wow-delay="400ms">
                            <div class="popular-course-content">
                                <h5>{{ $teacher->name }}</h5>
                                <span>Blood-Group : {{ $teacher->blood_group }} || Religion : {{ $teacher->religion }}</span>
                                <div class="course-ratings">
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                </div>
                                <p>
                                    Address : {{ $teacher->address }}<br>
                                    Phone : {{ $teacher->phone }}<br>
                                    Email : {{ $teacher->email }}<br>
                                </p>
                                <!-- <a href="#" class="btn academy-btn btn-sm">See More</a> -->
                            </div>
                            <div class="popular-course-thumb bg-img" style="background-image: url({{ asset('public/teachers/'.$teacher->photo) }} );"></div>
                        </div>
                    </div>
                @endforeach
                <!-- Single Teacher Ends -->

            </div>
        </div>
    </div>
    <!-- ##### Top Popular Courses Area End ##### -->

    <!-- ##### Partner Area Start ##### -->
    <div class="partner-area section-padding-0-100">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="partners-logo d-flex align-items-center justify-content-between flex-wrap">
                        <a href="#"><img src="{{ asset('public/frontend') }}/img/clients-img/partner-1.png" alt=""></a>
                        <a href="#"><img src="{{ asset('public/frontend') }}/img/clients-img/partner-2.png" alt=""></a>
                        <a href="#"><img src="{{ asset('public/frontend') }}/img/clients-img/partner-3.png" alt=""></a>
                        <a href="#"><img src="{{ asset('public/frontend') }}/img/clients-img/partner-4.png" alt=""></a>
                        <a href="#"><img src="{{ asset('public/frontend') }}/img/clients-img/partner-5.png" alt=""></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ##### Partner Area End ##### -->

    <!-- ##### CTA Area Start ##### -->
    <div class="call-to-action-area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="cta-content d-flex align-items-center justify-content-between flex-wrap">
                        <h3>Do you want to enrole at our Academy? Get in touch!</h3>
                        <a href="#" class="btn academy-btn">See More</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ##### CTA Area End ##### -->
@endsection