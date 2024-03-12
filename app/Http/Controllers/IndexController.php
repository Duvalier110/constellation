<?php

namespace App\Http\Controllers;

use App\Models\Chambre;
use App\Models\Reservation;
use Illuminate\Http\Request;
use App\Models\User;

class IndexController extends Controller
{
    public function Afficher_chambre()
  {
     $user = User::count();
     $chambre = Chambre::count();
     $resrevation = Reservation::count();
    //  $chambres = Chambre::where('statut', 'libre', array())->get();
     $chambres = Chambre::all();
    return view('index', compact('chambres','user', 'chambre', 'resrevation'));
  }
}
