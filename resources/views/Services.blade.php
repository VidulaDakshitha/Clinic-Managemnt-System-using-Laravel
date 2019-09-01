<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="/css/ServicesStyle.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  </head>
  <body>

      @if (session('status'))
      <div class="alert alert-success" role="alert">
          {{ session('status') }}
      </div>
  @endif

	
    <div class="services">
      <h1>Our Services</h1>

      @if (count($posts)>0)
      @foreach ($posts as $post)
      <div class="cen">
        <div class="service">
          <img src="/storage/images/{{$post->image}}">
          <h2>{{ $post->title }}</h2>
          <p>{{ $post->description }}</p>
        </div>

        </div>
        @endforeach
        @else
        <h3>You do not have any</h3>
        @endif
    </div>
    
 </body>
</html>
