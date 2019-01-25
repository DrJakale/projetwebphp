@extends('layouts.header')

@section('content')
<div class="fond">
    <div class="container panier"><h3>Mon profil</h3></div>
        <div class="container">
          <h4>Nom: </h4><h5>{{ Auth::user()->nom }}</h5>
          <h4>Prénom: </h4><h5>{{ Auth::user()->prenom }}</h5>
          <h4>Adresse Courriel: </h4><h5>{{ Auth::user()->email }}</h5>
        <div class="row">
        </div>
    </div>
  </div>
  </div>

@endsection

@section('footer')
@include('layouts.footer')
@endsection
