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
        <div id="carousel" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
            <li data-target="#carousel" data-slide-to="0" class="active"></li>
            <li data-target="#carousel" data-slide-to="1"></li>
            <li data-target="#carousel" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="{{ asset('images/lala.jpg') }}" class="img-responsive" style="margin:0px auto;" />
                </div>
                <div class="carousel-item">
                    <div class="carousel-page">
                        <img src="{{ asset('images/logs.png') }}" class="img-responsive img-rounded"style="margin:0px auto;"/>
                    </div>
                </div>
                <div class="carousel-item">
                <img src="{{ asset('images/lala.jpg') }}" class="img-responsive img-rounded" style="margin:0px auto;max-height:100%;"/>
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
            <img src="{{ asset('images/bde.jpg') }}" class="equipe-bde" title="équipe BDE" style="width: 1000px; height: auto">
</div>

    <div class="container">
    <div class="row">

        <div class="test col-md-4">
            <a href="{{ url('/event') }}"><img src="{{ asset('images/lala.jpg') }}" title="ZEBI"></a>
        </div>
        <div class="test col-md-4">
            <a href="{{ url('/boiteaidees') }}"><img src="{{ asset('images/lala.jpg') }}" title="ZEBI"></a>
        </div>
        <div class="test col-md-4">
             <a href="{{ url('/ecom') }}"><img src="{{ asset('images/lala.jpg') }}" title="ZEBI"></a>
        </div>
</div>
</div>    
               
            <p>
               Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
            </p>
            <p>
               Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
            </p>
            <p>
               Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
            </p>
            <p>
               Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
            </p>
            <p>
               Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
            </p>
@endsection