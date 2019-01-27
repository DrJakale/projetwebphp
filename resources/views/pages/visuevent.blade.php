@extends('layouts.header')
@section('content')

@if(Auth::ID() && Auth::User()->permission == 3)
<div class="container">
    <form method="post" action="/event/{{$idevent}}/report" >
      @csrf
      <input type="hidden" name="idevent" value="{{$idevent}}">
      <input type="submit" class="btn btn-xs btn-danger" value="{{ $events[0]->Reported_Event == 0 ? 'Signaler' : 'Annuler le signalement' }}">
    </form>
</div>
@endif


<div class = "container">
    <div col-sm-6>
        <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
  <div class="carousel-inner">
    @foreach ($events as $event)
      @if($event->Thumbnail == 1)
      <div class="carousel-item active">
      <a href="/photo/{{$event->ID}}">
      <img class = "img-fluid mx-auto d-block" src="{{$event->URL}}">
      </a>
    </div>
      @else
    <div class="carousel-item">
      <a href="/photo/{{$event->ID}}">
      <img src="{{$event->URL}}" class = "mx-auto d-block img-fluid">
      </a>
    </div>
  </div>
    @endif
    @endforeach

@foreach ($events as $event)
  <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
</div>
@endforeach
    <div class="col-sm-6">
           <div class="wrapper">
                <div class="caption post-content">
                    <h3>{{$event->TITLE}}</h3>
                    <h5>{{$event->Event_Date}}</h5>
                    <p>{{$event->TXT}}</p>
                </div>
            </div>
        </div>
</div>
@endsection
