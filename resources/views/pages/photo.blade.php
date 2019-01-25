@extends('layouts.header')
@section('content')
<div class="container" style="border:1px solid #cecece; max-width: 40%;">
@foreach($img as $photo)

    <img style="margin-top: 10px; " class = "img-fluid mx-auto d-block" src="{{$photo->URL}}">
@endforeach

@foreach($comment as $comment)
<hr>
    <p style="margin-left: 5px;">{{$comment->TXT}}</p>
@endforeach
</div>
@endsection