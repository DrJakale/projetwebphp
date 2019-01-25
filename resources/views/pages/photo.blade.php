@extends('layouts.header')
@section('content')
<div class='container'>
@foreach($img as $photo)

    <img class = "img-fluid mx-auto d-block" src="{{$photo->URL}}">
@endforeach

</div>

@foreach($comment as $comment)
    <p>{{$comment->TXT}}</p>
@endforeach
</div>
@endsection