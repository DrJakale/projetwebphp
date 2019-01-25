@extends('layouts.header')

@section('content')
<div class="fond">
    <div class="container panier"><h3>Mes commandes</h3></div>
            @foreach ($ordersindex as $orderindex)
            <div class="container" style="border:1px solid #cecece;"><h3><?php $date = explode("-",$orderindex->Date); echo $date[2] . '/' . $date[1] . '/' . $date[0];?> - Commande #{{$orderindex->ID}}</h3>
              <?php $total = 0; ?>
              @foreach ($orderscontent as $ordercontent)
              @if ($ordercontent->ID == $orderindex->ID)
              <?php $total += $ordercontent->Quantity * $ordercontent->Price; ?>
                <div class="col-md-12">
                    <div>
                        <div class="caption post-content col-md-8">
                            <div class="col-md-6">
                                <h5><strong>{{$ordercontent->Name}}</strong></br>Produit: #{{$ordercontent->ID_Stock}}</h5>
                            </div>
                            <h5 class=" col-md-6"><strong>{{number_format($ordercontent->Price,2)}} FRF</strong></br>Qté: {{$ordercontent->Quantity}}</h5>
                        </div>
                    </div>
                </div>
              @endif
              @endforeach
            <div>
            </br>
          </br>
        </br>
      </br>
              <hr width="100%" size="8" align="center">
              <h3>Total: {{number_format($total,2)}} FRF</h3>
            </div>
          </div>
        @endforeach
    </div>
  </div>
  </div>

@endsection

@section('footer')
@include('layouts.footer')
@endsection
