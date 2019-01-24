@extends('layouts.header')

@section('content')
<div class = "container">
<<<<<<< Updated upstream
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
=======
    <div class="col-sm-1 colsm-push-11">
        <a style = "margin-bottom:10px" type="button" class="btn btn-primary col-sm-push8" href = "createevent" >Créer évenement</a>
        
    </div>
</div>

<div class="container" style="border:1px solid #cecece;">
@foreach ($events as $event)
@if($event->Type == 1)
<a href="event/{{$event->ID_Events}}">
    <div class="col-sm-4">
            <img src="{{$event->URL}}" alt="..." height="180" width="320"/>

        
           <div class="wrapper">
                <div class="caption post-content">
                    <h3>{{$event->TITLE}}</h3>
                    <p>Lorem ipsum dolor sit amet</p>
                </div>
            </div>
        </div>
    </a>
@endif
@endforeach
</div>
<div class="container" style="border:1px solid #cecece;">
@foreach ($events as $event)
@if($event->Type == 2)
<a href="event/{{$event->ID_Events}}">
    <div class="col-sm-4">
            <img src="{{$event->URL}}" alt="..." height="180" width="320"/>

        
           <div class="wrapper">
                <div class="caption post-content">
                    <h3>{{$event->TITLE}}</h3>
>>>>>>> Stashed changes
                    <p>Lorem ipsum dolor sit amet</p>
                </div>
            </div>
        </div>
<<<<<<< Updated upstream
    </div>
</a>
=======
    </a>
@endif
>>>>>>> Stashed changes
@endforeach
</div>

@endsection