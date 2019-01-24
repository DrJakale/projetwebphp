@extends('layouts.header')

@section('content')
<div class = "container">
        <a href="createevent" class="btnevent" role="button">Créer évenement</a>
</div>
<div class="container" style="border:1px solid #cecece;">
  @foreach ($events as $event)
  <a href="event/{{$event->ID}}">
    <div class="col-sm-4">
        <img class="imgevent"src="{{$event->URL_Thumbnail}}" alt="..." height="180" width="320"/>
        <div class="wrapper">
            <div class="caption post-content">
                <h3 class="titlevent">{{$event->TITLE}}</h3>
                <div class="dscevent">
                    <p>Lorem ipsum dolor sit amet</p>
                </div>
            </div>
        </div>
    </div>
</a>
@endforeach
</div>
@endsection