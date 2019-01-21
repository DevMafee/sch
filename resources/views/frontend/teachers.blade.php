@extends('frontend.master')
@section('title')
	Teachers | Senapally High School
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
    <!-- ##### Breadcumb Area Start ##### -->
    <div class="breadcumb-area bg-img" style="background-image: url({{ asset('public/frontend') }}/img/bg-img/breadcumb.jpg);">
        <div class="bradcumbContent">
            <h2>Our Amazing Teachers</h2>
        </div>
    </div>
    <!-- ##### Breadcumb Area End ##### -->

    <!-- ##### Top Popular Courses Area Start ##### -->
    <div class="top-popular-courses-area mt-50 section-padding-100-70">
        <div class="container">
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
            {{ $teachers->links() }}
        </div>
    </div>
    <!-- ##### Top Popular Courses Area End ##### -->

    <!-- ##### Course Area Start ##### -->
    <div class="academy-courses-area section-padding-100-0">
        <div class="container">
            <div class="row">
                <!-- Single Course Area -->
                <div class="col-12 col-lg-4">
                    <div class="single-course-area d-flex align-items-center mb-100">
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
                <div class="col-12 col-lg-4">
                    <div class="single-course-area d-flex align-items-center mb-100">
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
                <div class="col-12 col-lg-4">
                    <div class="single-course-area d-flex align-items-center mb-100">
                        <div class="course-icon">
                            <i class="icon-map"></i>
                        </div>
                        <div class="course-content">
                            <h4>Photography</h4>
                            <p>Cras vitae turpis lacinia, lacinia la cus non, fermentum nisi.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ##### Course Area End ##### -->
@endsection