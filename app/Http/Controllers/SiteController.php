<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;

class SiteController extends Controller
{

    public function index(){
        return view('index');
    }
    public function services(){
        // return view('services', ["var1"=>"Value 1","var2"=>"Value 2"]);
        // $var1="hello";
        // $var2="world";
        // return view('services',compact('var1','var2'));

        $services = Service::all();
        return view('services', compact('services'));

    }
    public function about(){
        return view('about');
    }
    public function contact(){
        return view('contact');
    }
}
