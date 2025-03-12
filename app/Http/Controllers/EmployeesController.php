<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class EmployeesController extends Controller
{
    //
    public function index(){
        $response = Http::get('http://localhost:3000/api/v1/employees');
        $employees = $response->object();
        return view('homeland.admin.homeland.indexEmployees', compact('employees'));
        //dd($response->object());
    }

    public function employees_fetch(){
        return view ('homeland.admin.homeland.indexEmployeesFetch');

    }
}
