@extends('layouts.header')

@section('content')

<div class = "container">
  @switch(Auth::user()->permission)
    @case(1)
        <a href="createevent" class="btnevent" role="button">Proposer une idée</a>
        @break
    @case(2)
        <a href="createevent" class="btnevent" role="button">Créer un événement</a>
        @break
    @case(3)
        <a href="createevent" class="btnevent" role="button">Créer un événement</a>
        @break
    @Default
        @break
  @endswitch
</div>

<div class="container"><h3>Idées proposés</h3></div>
  <div class="container" style="border:1px solid #cecece;">
    @foreach ($events as $event)
    @if($event->Type == 0)
   <a href="event/{{$event->ID_Events}}">
      <div class="container">
        <img class="baiimg" src="{{$event->URL}}" alt="..." height="180" width="320"/>
        <div class="baitxt">
          <h3>{{$event->TITLE}} <a href="#" class="btn btn-sm btn-danger"><span class="glyphicon glyphicon-heart-empty"></span> </a> <a href="#" class="btn btn-sm btn-danger"><span class="glyphicon glyphicon-heart"></span> </a></h3>
          <p>{{$event->TXT}}</p>

        </div>
      </div>
    </a>
<hr>
  @endif
  @endforeach
</div>


</div>


@endsection

@section('footer')
@include('layouts.footer')
@endsection
