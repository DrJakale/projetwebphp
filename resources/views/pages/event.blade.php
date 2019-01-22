@extends('layouts.header')

@section('content')
<div class="container">
  @foreach ($events as $event)
    <div class="col-sm-4">
        <img src="{{$event->URL_Thumbnail}}" alt="..." height="180" width="320"/>
           <div class="wrapper">
                <div class="caption post-content">
                    <h3>{{$event->TITLE}}</h3>
                    <p>Lorem ipsum dolor sit amet</p>
                </div>
            </div>
        </div>
    @endforeach
</div>
@endsection