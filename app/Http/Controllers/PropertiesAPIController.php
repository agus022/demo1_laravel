<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Property;

class PropertiesAPIController extends Controller
{
    //
    public function properties(){
        $properties = Property::with('city')->with('list_type')->get();
        return response()->json($properties);
    }

    public function properties_datatables(){
        $properties = Property::with('city')->with('list_type')->get();
        return response()->json(["data" => $properties]);
    }

    public function saveContactAgent(Request $request){
        $validator = Validator::make($request->all(), [
            'name'    => 'required|max:50',
            'email'   => 'required|email|max:50',
            'phone'   => 'required|max:20|regex:/^[0-9+\-() ]+$/',
            'message' => 'required|max:1000',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->messages()->toArray(), 400);
        }
        $contact = new ContactAgent();
            $contact->name = $request->name;
            $contact->email = $request->email;
            $contact->phone = $request->phone;
            $contact->message = $request->message;
            $contact->save();


        return response()->json(["message"=>"Contact agent saved successfully! Thank you!"]);
    }
}
