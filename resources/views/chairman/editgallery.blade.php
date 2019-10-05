@extends('backend.layout')

@include('chairman.nav')

@section('content')
<div class="container">
    <h3>Edit Post</h3>
    <form class="form" action="/gallery/{{ $article->article_id }}" method="POST" enctype="multipart/form-data">
        {{ csrf_field() }}
        {{ method_field('PUT') }}

        <div class="form-group">
            <label for="title">Title</label>
            <input name="title" maxlength="20" id="title" class="form-control" type="text" placeholder="Title"
                value="{{ $article->title }}">
        </div>

        <div class="form-group">
            <label for="description">Description</label>
            <textarea name="description" maxlength="50" id="description" class="form-control"
                placeholder="Description">{{ $article->content }}</textarea>
        </div>

        <div class="form-group">
            <label for="image">Image</label>
            <input type="file" class="form-control-file" name="image" id="image" value="{{ $article->image }}">
        </div>

        <input type="submit" value="Submit" class="btn btn-primary">
    </form>
</div>
@endsection