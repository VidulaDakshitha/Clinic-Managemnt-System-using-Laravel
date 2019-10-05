@extends('main.layout.mainlayout');

@section('title', 'Welcome')

@section('content')
<div class="header-info">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-6 hi-item">
                <div class="hs-icon">
                    <img src="{{ asset('images/main/mainlayout/icons/map-marker.png') }}" alt="">
                </div>
                <div class="hi-content">
                    <h6>04 Michael's Road</h6>
                    <p>Colombo Sri Lanka</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 hi-item">
                <div class="hs-icon">
                    <img src="{{ asset('images/main/mainlayout/icons/clock.png') }}" alt="">
                </div>
                <div class="hi-content">
                    <h6>Opening Hours</h6>
                    <p>Mon - Sat: 8:00 - 19:00</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 hi-item">
                <div class="hs-icon">
                    <img src="{{ asset('images/main/mainlayout/icons/phone.png') }}" alt="">
                </div>
                <div class="hi-content">
                    <h6>+94 11 534561</h6>
                    <p>Call us now!</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 hi-item">
                <div class="hs-icon">
                    <img src="{{ asset('images/main/mainlayout/icons/calendar.png') }}" alt="">
                </div>
                <div class="hi-content">
                    <h6>Make an appointment</h6>
                    <p>call or login</p>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Hero section -->
<section class="hero-section image-overlay">
    <div class="hero-slider owl-carousel">
        <!-- item -->
        <div class="hs-item set-bg text-white" data-setbg="{{ asset('images/main/index/bg_doctor.jpg')}}">
            <div class="container">
                <div class="row">
                    <div class="col-xl-7">
                        <h2>Origins of Homeopathy</h2>
                        <p>Hahnemann vehemently denounced these practices, accusing his contemporaries of
                            “killing gradually more millions than Napoleon ever slew in battle.” He also condemned the
                            chaining and beating of “lunatics”, instead advocating “humanity combined with firmness”.
                        </p>
                        <a href="#" class="site-btn">Read More</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- item -->
        <div class="hs-item set-bg text-white" data-setbg="{{ asset('images/main/index/doctor_group.jpg') }}">
            <div class="container">
                <div class="row">
                    <div class="col-xl-7">
                        <h2>Best Team</h2>
                        <p>Homeopathy originates in the work of the German physician Samuel Hahnemann (1755-1843), who
                            coined the term from the Greek word homoios, which means same or similar, and pathos,
                            meaning disease or suffering. He became a doctor during a brutal period in medicine when
                            treatments involved blood-letting and giving doses of medicine so large the patient often
                            died.
                        </p>
                        <a href="#" class="site-btn">Read More</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Hero section end -->


<!-- Banner section -->
<section class="banner-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-7 banner-text text-white">
                <h4>Register now to make your first appointment.</h4>
                <!-- <p>*Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec malesuada lorem maximus.</p> -->
                <a href="/registerp" class="site-btn sb-light">Register</a>
            </div>
            <div class="col-lg-5 text-lg-right">
                <!-- <a href="#" class="site-btn sb-light">Read More</a> -->
            </div>
        </div>
    </div>
</section>
<!-- Banner section end -->



<!-- About section -->
<section class="about-section spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-5">
                <img src="{{ asset('images/main/index/child.jpg') }}" alt="">
            </div>
            <div class="col-lg-7 about-text">
                <h2>We Care About Your Health</h2>
                <p>Our experienced team care deeply about your well being. An experience over 30 years of homeopathy
                    treatments. A well-trained and professional staff at your service. A gentle and friendly staff to
                    take care of you.</p>
            </div>
        </div>
    </div>
</section>
<!-- About section end -->


<!-- Facts section -->
<section class="facts-section set-bg" data-setbg="{{ asset('images/main/index/facts-bg.jpg') }}">
    <div class="container">
        <div class="row">
            <div class="col-md-3 col-sm-6 fact">
                {{-- <i class="flaticon-017-pill"></i> --}}
                <h2>531</h2>
                <p>Cycles</p>
            </div>
            <div class="col-md-3 col-sm-6 fact">
                {{-- <i class="flaticon-002-toothbrush-1"></i> --}}
                <h2>14K</h2>
                <p>Products Sold</p>
            </div>
            <div class="col-md-3 col-sm-6 fact">
                {{-- <i class="flaticon-030-tooth"></i> --}}
                <h2>3</h2>
                <p>Countries</p>
            </div>
            <div class="col-md-3 col-sm-6 fact">
                {{-- <i class="flaticon-023-tooth-1"></i> --}}
                <h2>2134</h2>
                <p>Happy Patients and Customers</p>
            </div>
        </div>
    </div>
</section>
<!-- Facts section end -->



<!-- Services section -->
<section class="services-section spad">
    <div class="container">
        <div class="section-title text-center">
            <h2>Our Services</h2>
        </div>
        <div class="row">
            <div class="col-lg-4 col-md-6 service">
                <div class="service-icon">
                    <img src="{{ asset('images/main/index/svg-icons/001-medicine.svg') }}" style="width: 50px;" alt="">
                </div>
                <div class="service-content">
                    <h4>Auto-isopathy</h4>
                    <p>Treatment with remedies made from the particular patients’ own body substances.</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 service">
                <div class="service-icon">
                    <img src="{{ asset('images/main/index/svg-icons/002-first-aid-kit.svg') }}" style="width: 50px;"
                        alt="">
                </div>
                <div class="service-content">
                    <h4>Classical Homeopathy</h4>
                    <p>The individual is considered as a whole and symptoms from the body, mind, and spirit are
                        considered when choosing a homeopathic remedy.</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 service">
                <div class="service-icon">
                    <img src="{{ asset('images/main/index/svg-icons/003-stethoscope.svg') }}" style="width: 50px;"
                        alt="">
                </div>
                <div class="service-content">
                    <h4>Clinical Homeopathy</h4>
                    <p>Non-individualised treatment based mainly on guiding symptoms; (e.g. arnica for bruises).</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 service">
                <div class="service-icon">
                    <img src="{{ asset('images/main/index/svg-icons/004-care.svg') }}" style="width: 50px;" alt="">
                </div>
                <div class="service-content">
                    <h4>Complex homeopathy</h4>
                    <p>Uses remedies that are mixtures of ingredients or that prescribes several remedies taken in
                        combination.</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 service">
                <div class="service-icon">
                    <img src="{{ asset('images/main/index/svg-icons/005-doctor.svg') }}" style="width: 50px;" alt="">
                </div>
                <div class="service-content">
                    <h4>Homotoxicology</h4>
                    <p>A therapeutic branch which enables deep cleansing of the body tissues, removing old toxins,
                        disease processes and degenerative debris, leaving the fluids clean, fresh and able to
                        function as intended.</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 service">
                <div class="service-icon">
                    <img src="{{ asset('images/main/index/svg-icons/007-hospital.svg') }}" style="width: 50px;" alt="">
                </div>
                <div class="service-content">
                    <h4>Isopathy</h4>
                    <p>Use of remedies made from the causative agent, e.g. a specific allergen for an allergy.</p>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Services section end -->

<!-- Testimonials section -->
<section class="testimonials-section spad">
    <div class="container">
        <div class="section-title text-center">
            <h2>Testimonials</h2>
        </div>
    </div>
    <div class="testimonials-warp">
        <div class="testimonials-slider owl-carousel">
            @if (count($feedbacks)>0)
            @foreach ($feedbacks as $feedback)
            <div class="testimonial-item">
                <div class="ts-content">
                    <div class="quta">“</div>
                    <p>{{ $feedback->message }}</p>
                    <h6>{{ $feedback->name }}</h6>
                    <span>Patient</span>
                </div>
                {{-- <div class="author-pic set-bg" data-setbg="img/review/1.jpg"></div> --}}
            </div>
            @endforeach
            @else
            <div class="testimonial-item">
                <div class="ts-content">
                    <div class="quta">“</div>
                    <p>Tempus orci vel consequat. Nullam lorem sem, viverra a rutrum sed, gravida mattis magna.
                        Suspendisse vitae commodo quam. Quisque a enim et ante vulputate finibus.</p>
                    <h6>Jessica Brown</h6>
                    <span>Patient</span>
                </div>
                {{-- <div class="author-pic set-bg" data-setbg="img/review/1.jpg"></div> --}}
            </div>
            <div class="testimonial-item">
                <div class="ts-content">
                    <div class="quta">“</div>
                    <p>Nullam lorem sem, viverra a rutrum sed, gravida mattis magna. Suspendisse vitae commodo quam.
                        Quisque a enim et ante vulputate finibus.</p>
                    <h6>Jessica Brown</h6>
                    <span>Patient</span>
                </div>
                {{-- <div class="author-pic set-bg" data-setbg="img/review/2.jpg"></div> --}}
            </div>
            <div class="testimonial-item">
                <div class="ts-content">
                    <div class="quta">“</div>
                    <p>Phasellus vehicula tempus orci vel consequat. Nullam lorem sem, viverra a rutrum sed, gravida
                        mattis magna. Suspendisse vitae commodo quam. Quisque a enim et ante vulputate finibus nec
                        laoreet ipsum.</p>
                    <h6>Jessica Brown</h6>
                    <span>Patient</span>
                </div>
                {{-- <div class="author-pic set-bg" data-setbg="img/review/3.jpg"></div> --}}
            </div>
            <div class="testimonial-item">
                <div class="ts-content">
                    <div class="quta">“</div>
                    <p>Tempus orci vel consequat. Nullam lorem sem, viverra a rutrum sed, gravida mattis magna.
                        Suspendisse vitae commodo quam. Quisque a enim et ante vulputate finibus.</p>
                    <h6>Jessica Brown</h6>
                    <span>Patient</span>
                </div>
                {{-- <div class="author-pic set-bg" data-setbg="img/review/2.jpg"></div> --}}
            </div>
            @endif
        </div>
    </div>
</section>
<!-- Testimonials section end -->

<!-- Newsletter section -->
<section class="newsletter-section spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-7 banner-text text-white">
                <h4>Subscribe to our newsletter</h4>
                <p>Be the first to be notified of our offers...</p>
            </div>
            <div class="col-lg-5 text-lg-right">
                <form class="newsletter-form">
                    <input type="text" placeholder="Your E-mail">
                    <button class="site-btn sb-dark">Subscribe</button>
                </form>
            </div>
        </div>
    </div>
</section>
<!-- Newsletter section end -->
@endsection