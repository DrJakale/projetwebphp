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
    public function profile(){
        return view('pages.profile');
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
            ->where([['orderindex.id_user', '=', Auth::user()->id],['STATUS', '=', 0]])
            ->get();

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
        return view('pages.mescommandes');
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
        ->get();

        foreach($events as $event){
          if(strlen($event->TXT) > 858){
            $event->TXT = substr($event->TXT, 0, 855) . '...';
          }
        }
        return view('pages.boiteaidees')->with(array('events'=>$events));
    }

    public function visuevent($idevent){


        $events = DB::connection('mysql2')->table('events')->join('img','ID_Events','=','Events.ID')->where('ID_Events','=', $idevent)->get();
        //$img = DB::connection('mysql2')->table('img')->join('events','ID','=','img.ID_Events')->get();

        dump($events);
        return view('pages.visuevent')->with(array('events'=>$events/*'img'=>$img*/));
    }



    public function createevent(){
        return view('pages.createevent');
    }
    
    public function photo($idphoto){
        
        $img = DB::connection('mysql2')->table('img')->where('ID','=', $idphoto)->get();
        $comment = DB::connection('mysql2')->table('comment')->where('ID_IMG','=', $idphoto)->get();
        
        dump($img);
        dump($comment);
        return view('pages.photo')->with(array('img'=>$img, 'comment'=>$comment));
    }


}
