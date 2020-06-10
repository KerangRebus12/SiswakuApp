<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function homepage(){
        return view('page.homepage');
    }

    public function about(){
        $halaman = 'about';
        return view('page.about', compact('halaman'));
    }
    
}
