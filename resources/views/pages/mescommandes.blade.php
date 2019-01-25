@extends('layouts.header')

@section('content')
<div class="fond">
    <div class="container panier"><h3>Mes commandes</h3></div>
            @foreach ($ordersindex as $orderindex)
            <div class="container" style="border:1px solid #cecece;"><h3>{{$orderindex->Date}} - Commande #{{$orderindex->ID}}</h3>
              <?php $total = 0; ?>
              @foreach ($orderscontent as $ordercontent)
              @if ($ordercontent->ID == $orderindex->ID)
              <?php $total += $ordercontent->Quantity * $ordercontent->Price; ?>
                <div class="col-md-12">
                    <div>
                        <div class="caption post-content col-md-8">
                            <div class="col-md-4">
                                <h5>{{$ordercontent->Name}}</h5>
                            </div>
                            <h5 class=" col-md-4">{{number_format($ordercontent->Price,2)}} FRF</br>Qté: {{$ordercontent->Quantity}}</h5>
                        </div>
                    </div>
                </div>
              @endif
              @endforeach
              <h3>Total: {{number_format($total,2)}} FRF</h3>
          </div>
        @endforeach
    </div>
  </div>
  </div>

@endsection

@section('footer')
@include('layouts.footer')
@endsection
