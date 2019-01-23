@extends('layouts.header')

@section ('content')
<div class="test">
    <div class="container intro">
        <h1> BDE exia.CESI Strasbourg</h1>
        <p class="text-intro">
          Bienvenue sur le site du Bureau des élèves de l'exia.CESI Strasbourg
        </p>
      </div>
    <br>
    <br>
        <div id="carousel" class="carousel slide " data-ride="carousel">
            <ol class="carousel-indicators">
            <li data-target="#carousel" data-slide-to="0" class="active"></li>
            <li data-target="#carousel" data-slide-to="1"></li>
            <li data-target="#carousel" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="{{ asset('images/logs.png') }}" class="img-responsive" style="margin:0px auto; height: 500px;" />
                </div>
                <div class="carousel-item " >
                    <div class="carousel-page">
                        <img src="{{ asset('images/troll.jpg') }}" class="img-responsive "style="margin:0px auto; height: 500px;"/>
                    </div>
                </div>
                <div class="carousel-item ">
                <img src="{{ asset('images/troll.jpg') }}" class="img-responsive " style="margin:0px auto;height: 500px;"/>
                </div>
            </div>
            <a class="carousel-control-prev" href="#carousel" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carousel" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
            </a>
        </div>
    <br>
    <br>
    <br>
    <br>
    <div class= "equipe-txt" style="width:auto; text-align:center; padding:20px;">
            <p>Bienvenue sur le site du BDE de l'exia.CESI Strasbourg. L'équipe du BDE présente ci-dessous est à votre disposition.
            </p>
            <br>
            <br>
            <img src="{{ asset('images/bde.jpg') }}" class="equipe-bde" title="équipe BDE" style="width: 1000px; height: auto">
</div>

    <div class="container-case">
        <div class="row">

            <div class="col-sm bloc">
                <h1> Les evenements a venir</h1>
                <a href="{{ url('/event') }}"><img src="{{ asset('images/lala.jpg') }}"></a>
            </div>
            <div class="col-sm bloc">
            <h1> Boite à idées</h1>
                <a href="{{ url('/boiteaidees') }}"><img src="{{ asset('images/lala.jpg') }}" ></a>
            </div>
            <div class="col-sm bloc">
            <h1>La boutique du BDE</h1>
                <a href="{{ url('/ecom') }}"><img src="{{ asset('images/lala.jpg') }}" ></a>
            </div>
        </div>
    </div>    
               
            
@endsection