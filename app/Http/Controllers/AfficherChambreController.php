<?php

namespace App\Http\Controllers;
use App\Models\Chambre;
use App\Models\Categorie;
use App\Models\User;

use Illuminate\Http\Request;

class AfficherChambreController extends Controller
{


  public function room_controller(Request $request)
  {
    if(isset($request->enfant) && isset($request->adulte))
    {
      $chambres = Chambre::where('statut', 'libre', array())
      ->where('enfant', $request->enfant)
      ->where('adulte', $request->adulte)
      ->get();
      return view('presentation.room', compact('chambres'));
    }

    // $chambres = Chambre::where('statut', 'libre', array())->get();
    $chambres = Chambre::all();
    if($chambres)
    {
        return view('presentation.room', compact('chambres'));
    }

   }
  }




