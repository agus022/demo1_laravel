<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Property;
use App\Models\PropertyListingType;
use App\Models\ContactAgent;


class HomeLandController extends Controller
{
    public function index(){

        $properties =Property::all();
        return view('homeland.index', compact('properties'));
    }

    public function contact(){
        return view('homeland.contact');
    }

    public function buy(){
        return view('homeland.buy');
    }

    public function rent(){
        return view('homeland.rent');
    }

    public function about(){
        return view('homeland.about');
    }

    public function login(){
        return view('homeland.login');
    }

    public function register(){
        return view('homeland.register');
    }

    public function properties(){
        return view('homeland.properties');
    }

    public function property_details(Request $request, $property_id){
        if($request->isMethod("POST")){
            $contact = new ContactAgent();
            $contact->name=$request->input('name');
            $contact->email=$request->input('email');
            $contact->phone=$request->input('phone');
            $contact->message=$request->input('message');
            $contact->save();
            session()->now('message', 'Your message has been sent successfully!. Thank you!');
        }

        $property =Property::find($property_id);
        return view('homeland.property_details', compact ('property'));
    }
}
