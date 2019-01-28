<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use View;
use Auth;

class PagesController extends Controller
{
  //API ID = Nom Prénom
  public function getUserName($iduser){

    $json = json_decode(file_get_contents("http://chabanvpn.ovh:8080/api/users/" . $iduser), true);
    $res = (array) $json;

    foreach($res as $res){
      $id = $res['prenom'] . ' ' . $res['nom'];
    }
    return $id;
  }
    //pages de navigation basiques

    public function accueil(){
        return view('pages.accueil');
    }
    public function profil(){

        return view('pages.profil');
    }
    public function privacy(){
        return view('pages.privacy');
    }

    public function ventes(){
        return view('pages.ventes');
    }

    public function createproduct(){
      if(Auth::ID() && Auth::user()->permission == 2){
        return view('pages.createproduct');
      }else{
        return view('auth.login');
      }
    }

    //pages ecommerce
    public function panier(){
      if(Auth::id()){
      $basket = DB::connection('mysql2')->table('orderindex')
            ->join('contains', 'orderindex.id', '=', 'contains.id')
            ->join('stock', 'contains.id_stock', '=', 'stock.id')
            ->where([['orderindex.id_user', '=', Auth::user()->id],['STATUS', '=', 0]])
            ->select('stock.ID', 'Quantity', 'stock.IMG_URL', 'stock.Desc', 'stock.Name', 'stock.Price')
            ->get();

      $orderid = DB::connection('mysql2')->table('orderindex')
            ->where([['orderindex.id_user', '=', Auth::user()->id],['STATUS', '=', 0]])
            ->select('orderindex.ID')
            ->first();

            foreach($basket as $product){
              if(strlen($product->Desc) > 100){
                $product->Desc = substr($product->Desc, 0, 97) . '...';
              }
            }

            $basket->total = 0;

            foreach($basket as $ordercontent){
                $basket->total += $ordercontent->Quantity * $ordercontent->Price;
            }

            $basket->orderid = $orderid;

        return view('pages.panier')->with(array('basket'=>$basket));
      }else{
        return view('auth.login');
      }
    }

    public function panieradd(Request $request){

      //Vérification d'un panier pré-existant
      $panier = DB::connection('mysql2')->table('orderindex')->where('ID_User', '=', $request->input('userid'))->where('STATUS', '=', 0)->first();

      if($panier == null){
        //Sinon création d'un panier
        DB::connection('mysql2')->table('orderindex')->insert(['ID_User' =>  $request->input('userid'), 'STATUS' => 0]);
        //Obtention du panier
        $panier = DB::connection('mysql2')->table('orderindex')->where('ID_User', '=', $request->input('userid'))->where('STATUS', '=', 0)->first();
      }

      //Vérification du produit dans le panier
      $produit = DB::connection('mysql2')->table('contains')->where('ID', '=', $panier->ID)->where('ID_Stock', '=', $request->input('stockid'))->first();

      if($produit == null){
        //Sinon insertion du produit
        DB::connection('mysql2')->table('contains')->insert(['ID' => $panier->ID, 'ID_Stock' =>  $request->input('stockid'), 'Quantity' => 1]);
      }else{
        //Modification de la quantité
        $produit= DB::connection('mysql2')->table('contains')->where('ID', '=', $panier->ID)->where('ID_Stock', '=', $request->input('stockid'))->first();
        DB::connection('mysql2')->table('contains')->where('ID', '=', $panier->ID)->where('ID_Stock', '=', $request->input('stockid'))->update(array('Quantity' => ($produit->Quantity + 1)));
      }

        return redirect()->action('PagesController@ecom');
    }

    public function paniermaj(Request $request){

        $array = array_values((array)$request->input());

        for($i = 1; $i < (count($array)-2); $i+=2){
          $input[$array[$i]] = $array[$i+1];
        }

        foreach($input as $product => $quantity){
          if($quantity > 0){
            DB::connection('mysql2')->table('contains')->where('ID', $request->input('orderid'))->where('ID_Stock', '=',  $product)->update(array('Quantity' => $quantity));
          }else{
            DB::connection('mysql2')->table('contains')->where('ID', $request->input('orderid'))->where('ID_Stock', '=',  $product)->delete();
          }
        }

        if(null !== $request->input('order')){
            DB::connection('mysql2')->table('orderindex')->where('id', $request->input('orderid'))->update(array('STATUS' => 1, 'Date' => date('Y-m-d')));
        }
        return redirect()->action('PagesController@panier');
      }

    public function ecom(){
        $stock = DB::connection('mysql2')->table('stock')->get();
        $categories = DB::connection('mysql2')->table('categories')->get();

        return view('pages.ecom')->with(array('stock'=>$stock, 'categories'=>$categories));
    }

    public function catecom($idcat){
        $stock = DB::connection('mysql2')->table('stock')->where('ID_Categories', '=', $idcat)->get();
        $categories = DB::connection('mysql2')->table('categories')->where('ID', '=', $idcat)->get();
        //dump($categories)
        return view('pages.catecom')->with(array('stock'=>$stock, 'categories'=>$categories));
    }

    public function mescommandes(){
      if(Auth::id()){

        $currentordersindex = DB::connection('mysql2')->table('orderindex')
              ->where([['orderindex.id_user', '=', Auth::user()->id],['STATUS', '=', 1]])
              ->orderBy('ID', 'DESC')
              ->get();

        $currentorderscontent = DB::connection('mysql2')->table('orderindex')
              ->join('contains', 'orderindex.id', '=', 'contains.id')
              ->join('stock', 'contains.id_stock', '=', 'stock.id')
              ->where([['orderindex.id_user', '=', Auth::user()->id],['STATUS', '=', 1]])
              ->select('ID_User', 'STATUS', 'Quantity', 'Price', 'Name', 'orderindex.ID', 'ID_Stock')
              ->get();

        $finishedordersindex = DB::connection('mysql2')->table('orderindex')
              ->where([['orderindex.id_user', '=', Auth::user()->id],['STATUS', '=', 2]])
              ->orderBy('ID', 'DESC')
              ->get();

        $finishedorderscontent = DB::connection('mysql2')->table('orderindex')
              ->join('contains', 'orderindex.id', '=', 'contains.id')
              ->join('stock', 'contains.id_stock', '=', 'stock.id')
              ->where([['orderindex.id_user', '=', Auth::user()->id],['STATUS', '=', 2]])
              ->select('ID_User', 'STATUS', 'Quantity', 'Price', 'Name', 'orderindex.ID', 'ID_Stock')
              ->get();

        return view('pages.mescommandes')->with(array('currentordersindex'=>$currentordersindex, 'currentorderscontent'=>$currentorderscontent, 'finishedordersindex'=>$finishedordersindex, 'finishedorderscontent'=>$finishedorderscontent));
      }else{
        return view('auth.login');
      }
    }

    public function orderlist(){
      if(Auth::id()){

      $currentordersindex = DB::connection('mysql2')->table('orderindex')
            ->where([['STATUS', '=', 1]])
            ->orderBy('ID', 'DESC')
            ->get();

      $currentorderscontent = DB::connection('mysql2')->table('orderindex')
            ->join('contains', 'orderindex.id', '=', 'contains.id')
            ->join('stock', 'contains.id_stock', '=', 'stock.id')
            ->where([['STATUS', '=', 1]])
            ->select('ID_User', 'STATUS', 'Quantity', 'Price', 'Name', 'orderindex.ID', 'ID_Stock')
            ->get();

      $finishedordersindex = DB::connection('mysql2')->table('orderindex')
            ->where([['STATUS', '=', 2]])
            ->orderBy('ID', 'DESC')
            ->get();

      $finishedorderscontent = DB::connection('mysql2')->table('orderindex')
            ->join('contains', 'orderindex.id', '=', 'contains.id')
            ->join('stock', 'contains.id_stock', '=', 'stock.id')
            ->where([['STATUS', '=', 2]])
            ->select('ID_User', 'STATUS', 'Quantity', 'Price', 'Name', 'orderindex.ID', 'ID_Stock')
            ->get();

            foreach ($currentordersindex as $element) {
              $element->ClientName = PagesController::getUserName($element->ID_User);
            }
            foreach ($finishedordersindex as $element) {
              $element->ClientName = PagesController::getUserName($element->ID_User);
            }

        return view('pages.orderlist')->with(array('currentordersindex'=>$currentordersindex, 'currentorderscontent'=>$currentorderscontent, 'finishedordersindex'=>$finishedordersindex, 'finishedorderscontent'=>$finishedorderscontent));
      }else{
        return view('auth.login');
      }
    }

    public function finishorder(Request $request){

    DB::connection('mysql2')->table('orderindex')->where('id', $request->input('orderid'))->update(array('STATUS' => 2));

        return redirect()->action('PagesController@orderlist');
    }


    public function search(Request $recherche){

        $rechercheprod = DB::connection('mysql2')->table('stock')
                  ->where('stock.Name', 'LIKE', '%'.$recherche->input('recherche').'%')
                  ->get();
        dump($rechercheprod);
        return view('pages.rechercheecom')->with(array('rechercheprod'=>$rechercheprod));
    }



   //pages event

    public function event(){

        $events = DB::connection('mysql2')
        ->table('events')
        ->join('img', 'events.id', '=', 'img.id_events')
        ->where('Thumbnail', '=', 1)
        ->get();

        return view('pages.event')->with(array('events'=>$events));
    }

    public function boiteaidees(){

        $events = DB::connection('mysql2')
        ->table('events')
        ->join('img', 'events.id', '=', 'img.id_events')
        ->where('Thumbnail', '=', 1)
        ->select('events.ID','TXT','URL', 'Type', 'Reported_Event','ID_Events', 'TITLE')
        ->get();

        foreach($events as $event){
          if(strlen($event->TXT) > 500){
            $event->TXT = substr($event->TXT, 0, 497) . '...';
          }
        }

        $votes = DB::connection('mysql2')
        ->table('events')
        ->join('voteevent', 'events.id', '=', 'voteevent.id_events')
        ->get();

        foreach($events as $event){
          $event->votescount = 0;
          foreach($votes as $vote){
            if($vote->ID_Events == $event->ID){
              $event->votescount++;
            }
          }
        }

        return view('pages.boiteaidees')->with(array('events'=>$events,'votes'=>$votes));
    }

    public function voteevent(Request $request){

      if($request->input('likestatus') == 0){
        DB::connection('mysql2')->table('voteevent')->insert(['ID_User' =>  $request->input('userid'), 'ID_Events' => $request->input('eventid')]);
      }else{
        DB::connection('mysql2')->table('voteevent')->where('ID_User', '=', $request->input('userid'))->where('ID_Events', '=',  $request->input('eventid'))->delete();
      }

      return redirect()->action('PagesController@boiteaidees');
    }

    public function visuevent($idevent){


        $events = DB::connection('mysql2')->table('events')->join('img','ID_Events','=','Events.ID')->where('ID_Events','=', $idevent)->get();
        //$img = DB::connection('mysql2')->table('img')->join('events','ID','=','img.ID_Events')->get();

      return view('pages.visuevent')->with(array('events'=>$events))->with('idevent', $idevent/*'img'=>$img*/);
    }



    public function createevent(){
        return view('pages.createevent');
    }

    public function switchreportevent(Request $request){

        $event = DB::connection('mysql2')->table('events')->where('ID','=', $request->input('idevent'))->first();

        if($event->Reported_Event == 0){
          DB::connection('mysql2')->table('events')->where('id', $request->input('idevent'))->update(array('Reported_Event' => 1));
        }else{
          DB::connection('mysql2')->table('events')->where('id', $request->input('idevent'))->update(array('Reported_Event' => 0));
        }

        return redirect()->action('PagesController@visuevent', ['idevent' => $request->input('idevent')]);;
    }

    public function photo($idphoto){

        $img = DB::connection('mysql2')->table('img')->where('ID','=', $idphoto)->first();
        $comments = DB::connection('mysql2')->table('comment')->where('ID_IMG','=', $idphoto)->get();

        foreach ($comments as $comment) {
          $comment->AuthorName = PagesController::getUserName($comment->ID_User);
        }

        $likes = DB::connection('mysql2')
        ->table('img')
        ->join('likespicture', 'img.id', '=', 'likespicture.ID_IMG')
        ->get();


        foreach($likes as $like){
          $like->likescount = 0;
            if($like->ID_IMG == $like->ID){
              $like->likescount++;
            }
        }


        return view('pages.photo')->with(array('comments'=>$comments, 'img'=>$img, 'likes'=>$likes));
    }

    public function votephoto(Request $request){

      if($request->input('likestatus') == 0){
        DB::connection('mysql2')->table('likespicture')->insert(['ID_User' =>  $request->input('userid'), 'ID_IMG' => $request->input('photoid')]);
      }else{
        DB::connection('mysql2')->table('likespicture')->where('ID_User', '=', $request->input('userid'))->where('ID_IMG', '=',  $request->input('photoid'))->delete();
      }

      return redirect()->action('PagesController@photo', ['idphoto' => $request->input('photoid')]);
    }

    public function storecomment(Request $request, $idphoto){

        DB::connection('mysql2')->table('comment')->insert(
          ['ID_User' =>  $request->input('author'), 'ID_IMG' => $idphoto, 'TXT' => $request->input('comment')]
        );
        /*//Connection à la bdd en eloquent
        $commentModel = new commentModel;
        $commentModel->setConnection('mysql2');

        //Début tuto laravel
        $commentModel->comment = request('comment');

            $project->save();*/

        return redirect()->action('PagesController@photo', ['idphoto' => $idphoto]);;
    }

    public function deletecomment(Request $request){

        DB::connection('mysql2')->table('comment')->where('ID', '=', $request->input('commentid'))->delete();

        return redirect()->action('PagesController@photo', ['idphoto' => $request->input('idphoto')]);
    }
}
