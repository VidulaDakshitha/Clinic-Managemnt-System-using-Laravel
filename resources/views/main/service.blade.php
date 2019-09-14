@extends('main.layout.mainlayout')

@section('title', 'About Us')

@section('styles')
<link href="{{ asset('css/serv/adminserv.css') }}" rel="stylesheet">
@endsection

@section('js')

@endsection

@section('content')
<div class="container">
    @if(count($errors)>0)
        @foreach ($errors->all() as $error)
            <div class="alert alert-danger">
                {{ $error }}
            </div>
        @endforeach
    @endif

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif
 </div>

<div class="services">
@if(!auth::guest())
<a class="btn btn-primary" href="/ServiceTest/create">
Add new services
</a>
@endif
<h1>Our Services</h1>
</div>  

<div class="services">
<div class="container">
@if (count($posts)>0)
@foreach ($posts as $post)
<div class="service left col-lg-6 col-md-12 col-sm-12 p-5">
<img src="/storage/images/{{$post->image}}" >
<h2 class="text-center">{{ $post->title }}</h2>
<p>{{ $post->description }}</p>
@if(!auth::guest())
@if(auth::user()->id == $post->user_id)
    <a class="btn btn-primary" href="/ServiceTest/{{ $post->id }}/edit">Edit</a>
    <form class="form" action="/ServiceTest/{{ $post->id }}" method="POST">
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

@endsection