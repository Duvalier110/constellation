<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function aff_contact()
    {
        return view('contact.contact');
    }
}
