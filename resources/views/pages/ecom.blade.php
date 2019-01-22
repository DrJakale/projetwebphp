@extends('layouts.header')

@section('content')
<div class="container">
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
               </div>
            </div>
        </div>
    @endforeach
</div>
@endsection