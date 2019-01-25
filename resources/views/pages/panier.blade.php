@extends('layouts.header')

@section('content')
<div class="fond">
    <div class="container panier"><h3>Panier</h3></div>
      @if(!$basket->isEmpty())
            @foreach ($basket as $produit)
            <div class="container" style="border:1px solid #cecece;">
                <div class="col-md-12">
                    <div class="col-md-4">
                        <img src="{{$produit->IMG_URL}}" alt="..." height="180" width="320"/>
                    </div>
                    <div>
                        <div class="caption post-content col-md-8">
                            <div class="col-md-8">
                                <h4><strong>{{$produit->Name}}</strong></h4>
                                <p>{{$produit->Desc}}</p>
                            </div>
                            <h3 class=" col-md-4">{{$produit->Price}} FRF</h3>
                            <input type="number" name="quantity_{{$produit->ID}}" value="{{$produit->Quantity}}" min="1" max="100"/>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </form>
        <div class="container">
        <div class="row">
            <div class="col-md-2 col-xs-2 col1 center-block">
            <button type="submit" class="btn btn-primary center-block">{{ __('Commander') }}</button>
            </div>
        </div>
    </div>
        @else
          <div class="container" style="border:1px solid #cecece;">
            <div class="col-md-4">
              <h4>Votre panier est vide</h4>
            </div>
          </div>
        @endif
  </div>
  </div>

@endsection

@section('footer')
@include('layouts.footer')
@endsection
