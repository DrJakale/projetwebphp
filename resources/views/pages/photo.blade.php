@extends('layouts.header')
@section('content')
<div class="container" style="border:1px solid #cecece; max-width: 40%;">
@foreach($img as $photo)

    <img style="margin-top: 10px; " class = "img-fluid mx-auto d-block" src="{{$photo->URL}}">
@endforeach

@foreach($comment as $comment)
<hr>
    <p style="margin-left: 5px;">{{$comment->TXT}}</p>
@endforeach

</div>

<div class="container"  style="margin-top: 10px;">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">

                <div class="card-body">
                    <form method="POST">
                        @csrf

                        <div class="form-group row" >
                            <label for="email" class="col-md-2 col-form-label text-md-right">Commentaire</label>
                            <div class= "form-group" style="margin-left: 15px; margin-right: 15px;">
                                <textarea data-length=250 class="form-control" name="Text1" cols="100" rows="5"></textarea>
                            </div>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Connexion') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>



@endsection