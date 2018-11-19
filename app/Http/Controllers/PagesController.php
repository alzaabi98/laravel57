<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index() {
        $title = " Welcome to Laravel 5.7" ;
        //return view('pages.index',compact('title'));
        return view('pages.index')->with('title',$title);
    }

    public function about() {
        $data = [
            'title' => ' About Page',
            'services' => ['programming', 'desing','consultinh']
        ];
        
        return view('pages.about')->with($data);
    }
}
