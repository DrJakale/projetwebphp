@extends('layouts.header')

@section('content')

<div class="event">

    @if(Auth::ID() && Auth::User()->permission >=2)
    <div class="container event-tittle"><h3>Évenements signalés</h3></div>
    <div class="container event-case" >
        @foreach ($events as $event)
        @if($event->Type >= 1 && $event->Reported_Event == 1)
        <a href="event/{{$event->ID_Events}}">
            <div class="col-sm-4">
                <img src="{{$event->URL}}" alt="..." height="180" width="320" class="img-event"/></a>
                <div class="wrapper">
                    <div class="caption post-content ">
                        <h3>{{$event->TITLE}}</h3>
                    </div>
                </div>
            </div>
        
        @endif
        @endforeach
    </div>
    @endif

    <div class="container event-tittle"><h3>Évenements à venir</div>
        <div class="container event-case" >
            @foreach ($events as $event)
            @if($event->Type == 1 && $event->Reported_Event == 0)
            <a class="textevent" href="event/{{$event->ID_Events}}">
                <div class="col-sm-4">
                    <img src="{{$event->URL}}" alt="..." height="180" width="320" class="img-event" /></a>
                    <div class="wrapper">
                        <div class="caption post-content ">
                            <h3>{{$event->TITLE}}</h3>
                        </div>
                    </div>
                </div>
            

            @endif
            @endforeach
    </div>

    <div class="container event-tittle"><h3>Évenements passés</div>
        <div class="container event-case" >
            @foreach ($events as $event)
            @if($event->Type == 2 && $event->Reported_Event == 0)
            <a class="textevent" href="event/{{$event->ID_Events}}">
                <div class="col-md-4">
                    <img src="{{$event->URL}}" alt="..." height="180" width="320" /></a>
                    <div class="wrapper">
                        <div class="caption post-content">
                            <h3>{{$event->TITLE}}</h3>
                        </div>
                    </div>
                </div>
                
            
            @endif
            @endforeach
        </div>
    </div>

        @endsection

        @section('footer')
        @endsection
