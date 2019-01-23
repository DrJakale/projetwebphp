@extends('layouts.header')

@section('content')
<div class = "container">
    <div class="col-sm-1 colsm-push-11">
        <a style = "margin-bottom:10px" type="button" class="btn btn-primary col-sm-push8" href = "createevent" >Créer évenement</a>
    </div>
</div>
<div class="container" style="border:1px solid #cecece;">>
  @foreach ($events as $event)
<a href="event/{{$event->ID}}">
    <div class="col-sm-4">
        <img src="{{$event->URL_Thumbnail}}" alt="..." height="180" width="320"/>
           <div class="wrapper">
                <div class="caption post-content">
                    <h3>{{$event->TITLE}}</h3>
                    <p>Lorem ipsum dolor sit amet</p>
                </div>
            </div>
        </div>
    </a>
    @endforeach
</div>
@endsection