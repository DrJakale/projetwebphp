<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function home (){
    
    $cars = ['honda', 'audi'];
    return view('welcome', compact('cars'));
    
    }
    
    public function servicespage(){
    return view('pages.services');
    }
    
    public function login(){
        return view('pages.login');
    }
     public function boiteaidees(){
        return view('pages.boiteaidees');
    }
    public function accueil(){
        return view('pages.accueil');
    }
}
