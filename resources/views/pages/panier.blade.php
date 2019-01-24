@extends('layouts.header')

@section('content')
<div class="container"><h3>Panier</h3></div>
  @foreach ($basket as $produit)
  <div class="container" style="border:1px solid #cecece;">
  <div class="col-sm-12">

    <div class="col-sm-4">
        <img src="{{$produit->IMG_URL}}" alt="..." height="180" width="320"/>
    </div>
    <div class="col-sm-8">
                    <div class="caption post-content">
                        <h3 class=" col-sm-4">{{$produit->Name}}</h3>
                        <p class=" col-sm-4">{{$produit->Desc}}</p>
                        <h3>{{$produit->Price}}FRF</h3>
                   </div>

            </div>
      </div>
    </div>
    @endforeach
  </div>


@endsection

@section('footer')
@include('layouts.footer')
@endsection
