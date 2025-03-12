<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Models\Property;
use App\Models\PropertyListingType;
use App\Models\ContactAgent;
use App\Models\Contact;
use App\Models\Review;
use App\Mail\ContactMail;


class HomeLandController extends Controller
{
    public function index(){

        $properties =Property::all();
        return view('homeland.index', compact('properties'));
    }

    public function index_list(){

        $properties =Property::all();
        return view('homeland.view-list', compact('properties'));
    }

    public function buy(){
        $properties = Property::where("offer_type","For Sale")->get();
        return view('homeland.buy', compact('properties'));
    }

    public function rent(){
        //$properties = Property::all();
        $properties = Property::where("offer_type","For Rent")->get();
        return view('homeland.rent',  compact('properties')) ;
    }

    public function properties_listing_type($property_listing_type_id){
        $properties = PropertyListingType::find($property_listing_type_id)->properties;
        //dd($properties);
        return view('homeland.index', compact('properties'));
    }


    public function property_details(Request $request, $property_id){

        if($request->isMethod("POST")){
            //validate the form data using Laravel's validation rules and messages.a
            $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|email|max:50',
                'phone' => 'required|max:20|regex:/^[0-9+\-() ]+$/',
                'message' => 'required|string|max:1000',
            ],[
                'name.required' => 'The name field is required.',
                'email.required' => 'The email field is required.',
                'email.email' => 'The email must be a valid email address.',
                'phone.regex' => 'The phone number format is invalid.',
                'message.required' => 'The message field is required.',

            ]);
            $contact = new ContactAgent();
            $contact->name=$request->input('name');
            $contact->email=$request->input('email');
            $contact->phone=$request->input('phone');
            $contact->message=$request->input('message');
            $contact->save();
            session()->now('message', 'Your message has been sent successfully!. Thank you!');
        }

        $property =Property::find($property_id);
        $reviews = $property->reviews()->latest()->get();
        return view('homeland.property_details', compact ('property','reviews'));
    }


    public function review(Request $request, $property_id){
        $request->validate([
            'nameReview' => 'required|string|max:255',
            'emailReview' => 'required|email|max:255',
            'description' => 'required|string|max:1000',
            'rating' => 'required|integer|between:1,5',
        ]);

        $review = new Review();
        $review->name = $request->input('nameReview');
        $review->email = $request->input('emailReview');
        $review->description = $request->input('description');
        $review->rating = $request->input('rating');
        $review->property_id = $property_id;
        $review->save();

        return back()->with('message', 'Your review has been submitted successfully!');
    }

    public function contact(Request $request){
        if($request->isMethod("POST")){
            //validate the form data using Laravel's validation rules and messages.a
            $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|email|max:50',
                'subject' => 'required|string|max:255',
                'message' => 'required|string|max:1000',
            ],[
                'name.required' => 'The name field is required.',
                'email.required' => 'The email field is required.',
                'email.email' => 'The email must be a valid email address.',
                'message.required' => 'The message field is required.',

            ]);
            $contact = new Contact();
            $contact->name=$request->input('name');
            $contact->email=$request->input('email');
            $contact->subject=$request->input('subject');
            $contact->message=$request->input('message');
            $contact->save();

            Mail::to('20031296@itcelaya.edu.mx')->send(new ContactMail(
                $request->input("name"),
                $request->input("email"),
                $request->input("subject"),
                $request->input("message")
            ));
            session()->now('message', 'Your message has been sent successfully!. Thank you!');
        }
        return view('homeland.contact');
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

    // public function properties(){
    //     $properties =Property::all();
    //     return view('homeland.properties', compact('properties'));
    // }

}
