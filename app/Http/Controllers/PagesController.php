<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use View;
use Auth;

class PagesController extends Controller
{
     public function boiteaidees(){
        return view('pages.boiteaidees');
    }
    public function accueil(){
        return view('pages.accueil');



    }

    //pages ecommerce
    public function panier(){
      if(!Auth::id()){
      $basket = DB::connection('mysql2')->table('orderindex')
            ->join('contains', 'orderindex.id', '=', 'contains.id')
            ->join('stock', 'contains.id_stock', '=', 'stock.id')
            ->where([['orderindex.id_user', '=', Auth::user()->id],['STATUS', '=', 0]])
            ->get();

        return view('pages.panier')->with(array('basket'=>$basket));
      }else{
        return view('pages.login');
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

   //pages event

    public function event(){

        $events = DB::connection('mysql2')->table('events')->get();


        return view('pages.event')->with(array('events'=>$events));
    }

    public function visuevent($idevent){

        $events = DB::connection('mysql2')->table('events')->where('ID', '=', $idevent)->get();
        $img = DB::connection('mysql2')->table('img')->where('ID_Events', '=', $idevent)->get();


        //dump($events);
        return view('pages.visuevent')->with(array('events'=>$events,'img'=>$img));
    }

    public function createevent(){
        return view('pages.createevent');
    }


}
