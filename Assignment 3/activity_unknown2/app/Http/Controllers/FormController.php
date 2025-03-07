<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FormController extends Controller
{
    public function registration(){
        return view('simple-form');
    }

    public function register(Request $request){

        $validated = $request->validate([
            'Firstname' => 'required|max:50',
            'Lastname' => 'required|max:50',
            'Mobile_Phone' => 'required|regex:/^09\d{2}-\d{3}-\d{3}$/',
            'Tel_No.' => 'numeric',
            'Birth_date' => 'required|date_format:Y-m-d',
            'Address' => 'max:100',
            'Emails' => 'email',
            'Website' => 'url'
        ]);

        return back()->with('success', 'Form Submitted Successfully');
    }
}
