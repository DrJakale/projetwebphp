@extends('layouts.header')

@if(Auth::ID() && Auth::User()->permission == 3)
<div class="container">
    <form method="post" action="/event/{{$idevent}}/report" >
      @csrf
      <input type="hidden" name="idevent" value="{{$idevent}}">
      <input type="submit" class="btn btn-xs btn-danger" value="{{ $events[0]->Reported_Event == 0 ? 'Signaler' : 'Annuler le signalement' }}">
    </form>
</div>
@endif


<<<<<<< Updated upstream
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
=======
@section('content')
<div class="event">
  <div class = "container">  
          <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
            @foreach ($events as $event)
            @if($event->Thumbnail == 1)
              <div class="carousel-item active">
                <a href="photo/{{$event->ID}}">
                <img class = "img-fluid mx-auto d-block" src="{{$event->URL}}">
                </a>
              </div>
            @else
              <div class="carousel-item">
                <a href="photo/{{$event->ID}}">
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
        <div class="event-case">
                <div class="article-txt">
>>>>>>> Stashed changes
                    <h3>{{$event->TITLE}}</h3>
                    <h5>{{$event->Event_Date}}</h5>
                    <p>{{$event->TXT}}</p>
                </div>
            </div>
<<<<<<< Updated upstream
        </div>
</div>
@endsection
=======
            @endforeach
          </div>
      </div>
    </div>
  </div>
</div>
@endsection

@section('footer')
@include('layouts.footer')
@endsection
>>>>>>> Stashed changes
