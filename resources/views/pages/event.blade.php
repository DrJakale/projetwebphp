@extends('layouts.header')

@section('content')

<div class = "container">
        <a href="createevent" class="btnevent" role="button">Créer évenement</a>
</div>
<div class="container"><h3>Évenements à venir</div>
<div class="container" style="border:1px solid #cecece;">
@foreach ($events as $event)
@if($event->Type == 1)
<a href="event/{{$event->ID_Events}}">
    <div class="col-sm-4">
            <img src="{{$event->URL}}" alt="..." height="180" width="320"/>
           <div class="wrapper">
                <div class="caption post-content titleevent">
                    <h3>{{$event->TITLE}}</h3>
                    <p>Lorem ipsum dolor sit amet</p>
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
@if($event->Type == 2)
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
    </div>
@endif
@endforeach
</div>


@endsection

@section('footer')
@include('layouts.footer')
@endsection
