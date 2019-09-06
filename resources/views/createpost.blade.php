@extends('layouts.app')

@section('content')
<div class="container">
<form class="form" action="/ServiceTest" method="POST" enctype="multipart/form-data">
        @include('inc.editform', ['needImage'=>'true'])
    </form>
</div>
@endsection