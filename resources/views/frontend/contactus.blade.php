@extends('frontend.master')
@section('title')
	Contact | Senapally High School
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
            <h2>Contact</h2>
        </div>
    </div>
    <!-- ##### Breadcumb Area End ##### -->

    <!-- ##### Google Maps ##### -->
    <div class="map-area wow fadeInUp" data-wow-delay="300ms">
        <iframe width="100%" height="550" frameborder="0" style="border:0" src="https://www.google.com/maps/embed/v1/place?q=%E0%A6%B8%E0%A7%87%E0%A6%A8%E0%A6%BE%20%E0%A6%AA%E0%A6%B2%E0%A7%8D%E0%A6%B2%E0%A7%80%20%E0%A6%B9%E0%A6%BE%E0%A6%87%20%E0%A6%B8%E0%A7%8D%E0%A6%95%E0%A7%81%E0%A6%B2%2C%20Mirpur%20Road%2C%20Dhaka&key=AIzaSyAL7rlGz_JfZWFjn-zy97LvqQaOvm6YLCA" allowfullscreen></iframe>
    </div>

    <!-- ##### Contact Area Start ##### -->
    <section class="contact-area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="contact-content">
                        <div class="row">
                            <!-- Contact Information -->
                            <div class="col-12 col-lg-5">
                                <div class="contact-information wow fadeInUp" data-wow-delay="400ms">
                                    <div class="section-heading text-left">
                                        <span>The Best</span>
                                        <h3>Contact Us</h3>
                                        <p class="mt-30">Lacinia, lacinia la cus non, fermen tum nisi. Donec et sollicitudin. Morbi vel arcu gravida, iaculis lacus vel, posuere ipsum. Sed faucibus mauris vitae urna consectetur, sit amet maximus nisl sagittis. Ut in iaculis enim, et pulvinar mauris.</p>
                                    </div>

                                    <!-- Contact Social Info -->
                                    <div class="contact-social-info d-flex mb-30">
                                        <a href="#"><i class="fa fa-pinterest" aria-hidden="true"></i></a>
                                        <a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                                        <a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                                        <a href="#"><i class="fa fa-dribbble" aria-hidden="true"></i></a>
                                        <a href="#"><i class="fa fa-behance" aria-hidden="true"></i></a>
                                        <a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a>
                                    </div>

                                    <!-- Single Contact Info -->
                                    <div class="single-contact-info d-flex">
                                        <div class="contact-icon mr-15">
                                            <i class="icon-placeholder"></i>
                                        </div>
                                        <p>@yield('contact-address')</p>
                                    </div>

                                    <!-- Single Contact Info -->
                                    <div class="single-contact-info d-flex">
                                        <div class="contact-icon mr-15">
                                            <i class="icon-telephone-1"></i>
                                        </div>
                                        <p>Office: @yield('contact-phone')</p>
                                    </div>

                                    <!-- Single Contact Info -->
                                    <div class="single-contact-info d-flex">
                                        <div class="contact-icon mr-15">
                                            <i class="icon-contract"></i>
                                        </div>
                                        <p>@yield('contact-email')</p>
                                    </div>
                                </div>
                            </div>
                            <!-- Contact Form Area -->
                            <div class="col-12 col-lg-7">
                                <div class="contact-form-area wow fadeInUp" data-wow-delay="500ms">
                                    <form action="#" method="post">
                                        <input type="text" class="form-control" id="name" placeholder="Name">
                                        <input type="email" class="form-control" id="email" placeholder="E-mail">
                                        <textarea name="message" class="form-control" id="message" cols="30" rows="10" placeholder="Message"></textarea>
                                        <button class="btn academy-btn mt-30" type="submit">Contact Us</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ##### Contact Area End ##### -->
@endsection