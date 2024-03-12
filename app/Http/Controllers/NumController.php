<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CreateChambre;

class NumController extends Controller
{
    public function num_chambre()
    {
          $numchambres = CreateChambre::all();
          return view('admin.numChambre', compact('numchambres'));
    }

    public function ajouter_num(Request $request)
    {
        $request->validate([
            'num_chambre' => 'required',
            'num_etage' => 'required',           
          ]);
           $numchambre = new CreateChambre();
           $numchambre->num_chambre = $request->num_chambre;
           $numchambre->num_etage = $request->num_etage;

           $numchambre->save();
           return redirect('/numChambre');
    }

    public function delete_chambre($id)
    {
        $numchambres = CreateChambre::find($id);
        $numchambres->delete();
        return redirect('/numChambre');
    }
}
