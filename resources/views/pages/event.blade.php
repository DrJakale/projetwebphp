@extends('layouts.header')

@section('content')

@if(Auth::ID() && Auth::User()->permission >=2)
<div class="container"><h3>Évenements signalés</h3></div>
<div class="container" style="border:1px solid #cecece;">
@foreach ($events as $event)
@if($event->Type >= 1 && $event->Reported_Event == 1)
<a href="event/{{$event->ID_Events}}">
    <div class="col-sm-4">
            <img src="{{$event->URL}}" alt="..." height="180" width="320"/>
           <div class="wrapper">
                <div class="caption post-content titleevent">
                    <h3>{{$event->TITLE}}</h3>
                </div>
            </div>
        </div>
    </a>
@endif
@endforeach
</div>
@endif

<div class="container"><h3>Évenements à venir</div>
<div class="container" style="border:1px solid #cecece;">
@foreach ($events as $event)
@if($event->Type == 1 && $event->Reported_Event == 0)
<a href="event/{{$event->ID_Events}}">
    <div class="col-sm-4">
            <img src="{{$event->URL}}" alt="..." height="180" width="320"/>
           <div class="wrapper">
                <div class="caption post-content titleevent">
                    <h3>{{$event->TITLE}}</h3>
                </div>
            </div>
        </div>
    </a>
@endif
@endforeach
</div>

<div class="container"><h3>Évenements passés</div>
<div class="container" style="border:1px solid #cecece;">
@foreach ($events as $event)
@if($event->Type == 2 && $event->Reported_Event == 0)
<a href="event/{{$event->ID_Events}}">
    <div class="col-sm-4">
            <img src="{{$event->URL}}" alt="..." height="180" width="320"/>


           <div class="wrapper">
                <div class="caption post-content">
                    <h3>{{$event->TITLE}}</h3>
                </div>
            </div>
        </div>
    </div>
@endif
@endforeach
</div>


@endsection

@section('footer')
@include('layouts.footer')
@endsection
