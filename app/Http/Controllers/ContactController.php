<?php

namespace App\Http\Controllers;

use App\Models\Contacts;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index(){
        return view('contact');
    }

    public function store(Request $request){
            $request->validate([
                'name'=>'Required|min:4',
                'email'=>'required|email',
                'subject'=>'required',
                'message'=>'required']
            );

            Contacts::create($request->all());
            return back()->with('success', 'Thanks for contacting us! We will reach you soon.');

    }
}
