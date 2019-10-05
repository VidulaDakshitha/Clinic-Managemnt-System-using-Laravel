@extends('main.layout.mainlayout')

@section('title', 'About Us')

@section('styles')
<link href="{{ asset('css/about/aboutstyle.css') }}" rel="stylesheet">
<link href="{{ asset('css/about/templatemo-style.css') }}" rel="stylesheet">

<link href="{{ asset('css/about/aboutusletter.css') }}" rel="stylesheet">
@endsection

@section('content')




<div class="page-heading">
<div class="heading">
    <div class="heading-content">
        <h1><b>About</b> <em>Us</em></h1>
    </div>
</div>
</div>


<div class="services">

@if(!auth::guest())
    @if(auth::user()->type=="admin")
<a class="btn btn-primary" href="/aboutus/create">
    Create Posts
</a>
    @endif
@endif



<div class="container">
    @if (count($notices)>0)
    @foreach ($notices as $notice)
        <div class="service left col-lg-6 col-md-12 col-sm-12 p-5">
        <img src="/storage/images/{{$notice->image}}" >
        <h2 class="text-center"><b>{{ $notice->title }}</b></h2>
        <p style="font-family:kanit;">{{ $notice->content }}</p>
            @if(!auth::guest())
                @if(auth::user()->id == $notice->doctor_id)
                    <a class="btn btn-primary" href="/aboutus/{{ $notice->notice_id }}/edit">Edit</a>
                    <form class="form" action="/aboutus/{{ $notice->notice_id }}" method="POST">
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}
                        <input type="submit" class="btn btn-danger" value="Remove">
                    </form>
                @endif
            @endif
        </div>
    @endforeach
    @else
    <p>No posts to show</p>
    @endif    
</div>

</div>


<div class="about">
<div class="box">
      <div class="icon">01</div>
<div class="content">
  <h2><b>Our Mission</b></h2>
  <p style="font-family:kanit; font-size:18px">To be the foremost and preferred Private Healthcare Facility in the country</p>
</div>
</div>

<div class="box">
  <div class="icon">02</div>
<div class="content">
  <h2><b>Our Vision</b></h2>
  <p style="font-family:kanit; font-size:18px">To maintain exceptional and compassionate quality while offering cost effective healthcare solutions of international standards</p>
</div>
</div>

<div class="box">
<div class="icon">03</div>
<div class="content">
  <h2><b>Our Promise</b></h2>
  <p style="font-family:kanit; font-size:18px">We will be sincere, compassionate and sensitive to make a difference in the lives we touch</p>
</div>
</div>

</div>

<!-- Newsletter section end -->
@endsection