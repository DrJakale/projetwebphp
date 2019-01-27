@extends('layouts.header')
@section('content')

<div class="container" style="border:1px solid #cecece; max-width: 40%;">
    <img style="margin-top: 10px; " class = "img-fluid mx-auto d-block" src="{{$img->URL}}">

@foreach($comments as $comment)
<hr>
    <h5 style="margin-left: 5px;"><strong>{{$comment->AuthorName}}</strong></h5><p style="margin-left: 5px;">{{$comment->TXT}}</p>
@endforeach
</div>



<div class="container"  style="margin-top: 10px;">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">

                <div class="card-body">
                    <form method="post" action="/comment/{{$img->ID}}/{{Auth::ID()}}" >
                      @csrf
                        <div class="form-group row" >
                            <label for="commentaire" class="col-md-2 col-form-label text-md-right">Commentaire</label>
                            <div class= "form-group" style="margin-left: 15px; margin-right: 15px;">
                                <textarea data-length=250 class="form-control" name="comment" cols="100" rows="5"></textarea>
                            </div>
                        </div>
                    <div class="col-md-8 offset-md-4">
                        <input type="submit" value="Envoyer">
                    </div>

                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
