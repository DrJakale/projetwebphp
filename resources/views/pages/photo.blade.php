@extends('layouts.header')
@section('content')

<div class="container" style="border:1px solid #cecece; max-width: 40%;">
    <img style="margin-top: 10px; " class = "img-fluid mx-auto d-block" src="{{$img->URL}}">

@foreach($comments as $comment)
<hr>
  <div>
    <div class="row">
      <div class="col-10"><h5 style="margin-left: 5px;"><strong>{{$comment->AuthorName}}</strong></h5></div>
      @if(Auth::ID() && ($comment->ID_User == Auth::ID() || Auth::User()->permission == 2))
        <div class="col-1">
          <form method="post" action="{{$img->ID}}/deletecommentary">
            @csrf
            <input type="hidden" name="idphoto" value="{{$img->ID}}">
            <input type="hidden" name="commentid" value="{{$comment->ID}}">
            <input type="submit" class="btn btn-xs btn-warning" value="Supprimer">
          </form>
        </div>
      @endif
    </div>
    <div class="row">
      <p  style="margin-left: 35px;">{{$comment->TXT}}</p>
    </div>
  </div>
@endforeach
</div>


@if(Auth::ID())
<div class="container"  style="margin-top: 10px;">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">

                <div class="card-body">
                    <form method="post" action="{{$img->ID}}/publishcommentary" >
                      @csrf
                        <div class="form-group row" >
                            <label for="commentaire" class="col-md-2 col-form-label text-md-right">Commentaire</label>
                            <div class= "form-group" style="margin-left: 15px; margin-right: 15px;">
                                <textarea data-length=250 class="form-control" name="comment" cols="100" rows="5"></textarea>
                                <input type="hidden" name="author" value="{{Auth::ID()}}">
                            </div>
                        </div>
                        <div class="col-md-8 offset-md-4">
                          <input type="submit"  class="btn btn-xs btn-default" value="Envoyer">
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>
@endif
@endsection
