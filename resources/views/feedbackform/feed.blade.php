@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Feedback</h1>
<form class="form" action="/feedbacktest" method="POST" enctype="multipart/form-data">
		
    @csrf

        <div class="form-group">
            <label for="name">Name</label>
            <input name="name" maxlength="15" id="name" class="form-control" type="text" placeholder="name" value="{{ Auth::user()->name }}" readonly>
		</div>
		
		<div class="form-group">
            <label for="email">Email</label>
            <input name="email" maxlength="20" id="email" class="form-control" type="text" placeholder="email" value="{{ Auth::user()->email }}" readonly>
        </div>
        
        <div class="form-group">
            <label for="message">Message</label>
            <textarea name="message" maxlength="100" id="message" class="form-control" placeholder="message"></textarea>
        </div>
      

        <div class="form-group">
            <input type="submit" value="Submit" class="btn btn-primary" >
        </div>
    </form>
</div>
@endsection