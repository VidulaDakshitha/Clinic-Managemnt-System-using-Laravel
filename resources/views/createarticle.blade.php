@extends('layouts.app')

@section('content')
<div class="container">
<form class="form" action="/gallery" method="POST" enctype="multipart/form-data">
        @include('inc.editform', ['needImage'=>'true'])
    </form>
</div>
@endsection