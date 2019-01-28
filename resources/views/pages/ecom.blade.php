@extends('layouts.header')

@section('content')
<form action="/search" method="POST" role="search">
    {{ csrf_field() }}
    <div class="input-group">
        <input type="text" class="form-control" name="recherche"
            placeholder="Recherche de produits"> <span class="input-group-btn">
            <button type="submit" class="btn btn-default">
                <span class="glyphicon glyphicon-search"></span>
            </button>
        </span>
    </div>
</form>
<div class="container" style="border:1px solid #cecece;">
    <h3>Liste des catégories</h3>
  @foreach ($categories as $categories)
    <div class="col-sm-4" href="cat/{{$categories->ID}}">
        <img src="{{$categories->IMG_URL}}" alt="..." height="180" width="320"/>
           <div class="wrapper">
                <div class="caption post-content col-sm-6">
                    <a href="cat/{{$categories->ID}}">
                    <h3>{{$categories->TITLE}}</h3>
                    </a>
                </div>
            </div>
        </div>
    @endforeach
</div>

<div class="container" style="border:1px solid #cecece;">
    <h3>Liste des produits</h3>
  @foreach ($stock as $produit)
    <form method="post" action="ecom">
      @csrf
    <div class="col-sm-4">
        <input type="hidden" name="stockid" value="{{$produit->ID}}"/>
        <input type="hidden" name="userid" value="{{Auth::ID()}}"/>
        <img src="{{$produit->IMG_URL}}" alt="..." height="180" width="320"/>
           <div class="wrapper">
                <div class="caption post-content col-sm-6">
                    <h3>{{$produit->Name}}</h3>
                    <p>{{$produit->Desc}}</p>
                </div>
               <div class="caption post-content col-sm-6">
                    <h4><strong>{{number_format($produit->Price,2)}} FRF</strong></h4>
                    @if(Auth::ID())
                    <input type="submit" class="btnrefresh" style="margin-top: 5px; margin-right: 5px;" value="Ajouter au panier"/>
                    @endif
               </div>
            </div>
        </div>
      </form>
    @endforeach
</div>
@endsection
