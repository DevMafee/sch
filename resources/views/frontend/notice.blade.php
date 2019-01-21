@extends('frontend.master')
@section('title')
	Notice | Senapally High School
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
    <div class="breadcumb-area bg-img" style="background-image: url({{ asset('public/frontend') }}/img/bg-img/red-notice.png);">
        <div class="bradcumbContent">
            <h2>Notices</h2>
        </div>
    </div>
    <!-- ##### Breadcumb Area End ##### -->

    <!-- ##### Blog Area Start ##### -->
    <div class="blog-area mt-50 section-padding-100">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-8">
                    <div class="academy-blog-posts">
                        <div class="row">

                            <!-- Single Blog Start -->
                            @foreach($notices as $notice)
                                <div class="col-12">
                                    <div class="single-blog-post mb-50 wow fadeInUp" data-wow-delay="300ms">
                                        <!-- Post Thumb -->
                                        <div class="blog-post-thumb mb-50">
                                            @if($notice->notice_file != '')
                                                <img src="{{ asset('public/notices/'.$notice->notice_file) }}" alt="{{ $notice->notice_title }}" style="max-height: 300px; width: 100%;">
                                            @endif
                                        </div>
                                        <!-- Post Title -->
                                        <a href="#" class="post-title">{{ $notice->notice_title }}</a>
                                        <!-- Post Meta -->
                                        <div class="post-meta">
                                            <p>Published @ {{ $notice->created_at }}</p>
                                        </div>
                                        <!-- Post Excerpt -->

                                            {!! $notice->notice_description !!}

                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>

                <div class="col-12 col-md-4">
                    <div class="academy-blog-sidebar">

                        <!-- Blog Post Catagories -->
                        <div class="blog-post-categories mb-30">
                            <h5>Notices</h5>
                            <ul>
                            @foreach($notices_more as $notice_more)
                                <li><a href="{{ $notice_more-> notice_file }}">{{ $notice_more-> notice_title }}</a></li>
                            @endforeach
                            </ul>
                        </div>

                        <!-- Latest Blog Posts Area -->
                        <div class="latest-blog-posts mb-30">
                            <h5>Latest Posts</h5>
                            <!-- Single Latest Blog Post -->
                            <div class="single-latest-blog-post d-flex mb-30">
                                <div class="latest-blog-post-thumb">
                                    <img src="{{ asset('public/frontend') }}/img/blog-img/lb-1.jpg" alt="">
                                </div>
                                <div class="latest-blog-post-content">
                                    <a href="#" class="post-title">
                                        <h6>New Courses for you</h6>
                                    </a>
                                    <a href="#" class="post-date">March 18, 2018</a>
                                </div>
                            </div>
                            <!-- Single Latest Blog Post -->
                            <div class="single-latest-blog-post d-flex mb-30">
                                <div class="latest-blog-post-thumb">
                                    <img src="{{ asset('public/frontend') }}/img/blog-img/lb-2.jpg" alt="">
                                </div>
                                <div class="latest-blog-post-content">
                                    <a href="#" class="post-title">
                                        <h6>A great way to start</h6>
                                    </a>
                                    <a href="#" class="post-date">March 18, 2018</a>
                                </div>
                            </div>
                            <!-- Single Latest Blog Post -->
                            <div class="single-latest-blog-post d-flex mb-30">
                                <div class="latest-blog-post-thumb">
                                    <img src="{{ asset('public/frontend') }}/img/blog-img/lb-3.jpg" alt="">
                                </div>
                                <div class="latest-blog-post-content">
                                    <a href="#" class="post-title">
                                        <h6>New Courses for you</h6>
                                    </a>
                                    <a href="#" class="post-date">March 18, 2018</a>
                                </div>
                            </div>
                            <!-- Single Latest Blog Post -->
                            <div class="single-latest-blog-post d-flex">
                                <div class="latest-blog-post-thumb">
                                    <img src="{{ asset('public/frontend') }}/img/blog-img/lb-4.jpg" alt="">
                                </div>
                                <div class="latest-blog-post-content">
                                    <a href="#" class="post-title">
                                        <h6>Start your training</h6>
                                    </a>
                                    <a href="#" class="post-date">March 18, 2018</a>
                                </div>
                            </div>
                        </div>

                        <!-- Add Widget -->
                        <div class="add-widget">
                            <a href="#"><img src="{{ asset('public/frontend') }}/img/blog-img/add.png" alt=""></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ##### Blog Area End ##### -->
@endsection