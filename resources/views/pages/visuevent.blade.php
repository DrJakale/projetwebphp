@extends('layouts.header')
@section('content')
@foreach ($events as $event)
<div class = "container">
    <div class="col-sm-4">
        <img src="{{$event->URL_Thumbnail}}" alt="..." height="360" width="640">
           <div class="wrapper">
                <div class="caption post-content">
                    <h3>{{$event->TITLE}}</h3>
                    <h5>{{$event->Event_Date}}</h5>
                    <p>{{$event->URL_TXT}}</p>
                </div>
            </div>
        </div>
    @endforeach
</div>
@endsection