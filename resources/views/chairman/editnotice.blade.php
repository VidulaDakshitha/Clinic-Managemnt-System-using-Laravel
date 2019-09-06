@extends('layouts.app')

@section('content')
<div class="container">
<h3>Edit Post</h3>
<form class="form" action="/aboutus/{{ $notice->notice_id }}" method="POST" enctype="multipart/form-data">
        {{ csrf_field() }}
        {{ method_field('PUT') }}

        <div class="form-group">
            <label for="title">Title</label>
        <input name="title" id="title" class="form-control" type="text" placeholder="Title" value="{{ $notice->title }}">
        </div>
        
        <div class="form-group">
            <label for="description">Description</label>
        <textarea name="description" id="description" class="form-control" placeholder="Description">{{ $notice->description }}</textarea>
        </div>
        
        <div class="form-group">
            <label for="image">Image</label>
        <input type="file" class="form-control-file" name="image" id="image" value="{{ $notice->image }}">
        </div>

        <input type="submit" value="Submit" class="btn btn-primary" >
    </form>
</div>
@endsection