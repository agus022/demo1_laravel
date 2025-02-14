<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Property;
use App\Models\PropertyListingType;


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

    public function property_details($property_id){
        $property =Property::find($property_id);
        //$propertyType=PropertyListingType::find($property->property_listing_type_id);

        return view('homeland.property_details', compact ('property'));
    }
}
