<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use View;

class PagesController extends Controller
{
   
    public function login(){
        return view('pages.login');
    }
     public function boiteaidees(){
        return view('pages.boiteaidees');
    }
    public function accueil(){
        return view('pages.accueil');
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
;
    }
    
    
    
    public function event(){
        
        $events = DB::connection('mysql2')->table('events')->get();
        
        
        return view('pages.event')->with(array('events'=>$events));  }
}
