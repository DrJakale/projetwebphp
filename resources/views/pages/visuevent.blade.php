@extends('layouts.header')
@section('content')
@foreach ($events as $event)
<div class = "container">
    
        
    <div col-sm-6>
        <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img class = "img-fluid mx-auto d-block" src="{{$event->URL_Thumbnail}}" > 
    </div>
      @foreach($img as $img)
    <div class="carousel-item">
      <img src="{{$img->URL}}" class = "mx-auto d-block img-fluid">
    </div>
      @endforeach
  </div>
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
    <div class="col-sm-6">
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

