@extends('layouts.header')

@section('content')
<div class = "container">
<div class="col-sm-1 colsm-push-11">
<button type="button" class="btn btn-primary col-sm-push8" >Panier</button>
</div>
</div>

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
    <div class="col-sm-4">
        <img src="{{$produit->IMG_URL}}" alt="..." height="180" width="320"/>
           <div class="wrapper">
                <div class="caption post-content col-sm-6">
                    <h3>{{$produit->Name}}</h3>
                    <p>{{$produit->Desc_URL}}</p>
                </div>
               <div class="caption post-content col-sm-6">
                    <h3>{{$produit->Price}}€</h3>
                   <button type="button" class="btn btn-primary btn-xs">Ajouter au panier</button>
               </div>
            </div>
        </div>
    @endforeach
</div>
@endsection

@section('footer')
@include('layouts.footer')
@endsection