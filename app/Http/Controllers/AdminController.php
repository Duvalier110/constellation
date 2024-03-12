<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;



class AdminController extends Controller
{
    public function tableau_de_bord()
    {
        return view('admin.index');
    }
    
    
}
