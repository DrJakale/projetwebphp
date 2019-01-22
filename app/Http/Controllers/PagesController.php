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
        return view('pages.ecom');
    }
    public function event(){
        
        $events = DB::connection('mysql2')->table('events')->get();
        
        
        return view('pages.event')->with(array('events'=>$events));  }
}
