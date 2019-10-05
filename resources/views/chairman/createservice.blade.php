@extends('backend.layout')

@include('chairman.nav')

@section('content')
<div class="container">
    <form class="form" action="/ServiceTest" method="POST" enctype="multipart/form-data">
        {{ csrf_field() }}

        <div class="form-group">
            <label for="title">Title</label>
            <input name="title" maxlength="20" id="title" class="form-control" type="text" placeholder="Title">
        </div>

        <div class="form-group">
            <label for="description">Description</label>
            <textarea name="description" maxlength="48" id="description" class="form-control"
                placeholder="Description"></textarea>
        </div>

        <div class="form-group">
            <label for="image">Image</label>
            <input type="file" class="form-control-file" name="image" id="image">
        </div>

        <div class="form-group">
            <input type="submit" value="Submit" class="btn btn-primary">
        </div>
    </form>

    <button type="button" onclick="myFunction()" class="btn btn-primary">Demo</button>

    <script>
        function myFunction() {
            document.getElementById("title").value = "New Service";
            document.getElementById("description").value = "A description about Service";
        }
    
    </script>

</div>
@endsection