<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use View;
use Auth;

class PagesController extends Controller
{
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

    //pages ecommerce
    public function panier(){
      if(Auth::id()){
      $basket = DB::connection('mysql2')->table('orderindex')
            ->join('contains', 'orderindex.id', '=', 'contains.id')
            ->join('stock', 'contains.id_stock', '=', 'stock.id')
            ->join('categories', 'stock.id', '=', 'categories.id')
            ->where([['orderindex.id_user', '=', Auth::user()->id],['STATUS', '=', 0]])
            ->select('stock.ID', 'Quantity', 'stock.IMG_URL', 'stock.Desc', 'stock.Name', 'stock.Price', 'categories.TITLE')
            ->get();

            foreach($basket as $product){
              if(strlen($product->Desc) > 100){
                $product->Desc = substr($product->Desc, 0, 97) . '...';
              }
            }
        return view('pages.panier')->with(array('basket'=>$basket));
      }else{
        return view('auth.login');
      }
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

      $ordersindex = DB::connection('mysql2')->table('orderindex')
            ->where([['orderindex.id_user', '=', Auth::user()->id],['STATUS', '=', 1]])
            ->orderBy('ID', 'DESC')
            ->get();

      $orderscontent = DB::connection('mysql2')->table('orderindex')
            ->join('contains', 'orderindex.id', '=', 'contains.id')
            ->join('stock', 'contains.id_stock', '=', 'stock.id')
            ->where([['orderindex.id_user', '=', Auth::user()->id],['STATUS', '=', 1]])
            ->select('ID_User', 'STATUS', 'Quantity', 'Price', 'Name', 'orderindex.ID', 'ID_Stock')
            ->get();

        return view('pages.mescommandes')->with(array('ordersindex'=>$ordersindex, 'orderscontent'=>$orderscontent));
      }else{
        return view('auth.login');
      }
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

        //$events = array_multisort((array)$events);

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

    public function getCommentaryAuthor($idauthor){

      $json = json_decode(file_get_contents("http://chabanvpn.ovh:8080/api/users/" . $idauthor), true);
      $res = (array) $json;

      foreach($res as $res){
        $id = $res['prenom'] . ' ' . $res['nom'];
      }
      return $id;
    }

    public function photo($idphoto){

        $img = DB::connection('mysql2')->table('img')->where('ID','=', $idphoto)->first();
        $comments = DB::connection('mysql2')->table('comment')->where('ID_IMG','=', $idphoto)->get();

        foreach ($comments as $comment) {
          $comment->AuthorName = PagesController::getCommentaryAuthor($comment->ID_User);
        }

        return view('pages.photo')->with(array('comments'=>$comments, 'img'=>$img));
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
