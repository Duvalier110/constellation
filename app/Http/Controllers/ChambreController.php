<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Chambre;
use App\Models\Categorie;
use App\Models\User;

class ChambreController extends Controller
{
    public function tableau_chambre()
    {
         $chambres = Chambre::all();
         $categories = Categorie::all();
         $users = User::all();
         return view('admin.chambre', compact('chambres', 'categories', 'users'));
    }
    public function publi_chambre()
    {
        $chambres = Chambre::all();
        $categories = Categorie::all();
        $users = User::all();
        return view('admin.formchambre', compact('chambres', 'categories', 'users'));
    }
    public function ajouter_chambre_traitement(Request $request)
    {
      $request->validate([
        'User' => 'required',
        'nom' => 'required',
        'libelle' => 'required',
        'lit' => 'required',
        'baignoire' => 'required',
        'num_chambre' => 'required',
        'num_etage' => 'required',
        'photo' => 'required',
        'prix' => ['required', 'numeric', 'min:0'],
        'statut' => 'required',
        'enfant' => 'required',
        'adulte' => 'required',
      ]);
       $chambre = new Chambre();
       //uplodage
       if(!empty($request->file('photo'))){
        $url = $request->file('photo')->store('uploads/images/chambre', 'public');
        $photo=url('storage/' . $url);
        $chambre['photo'] = $photo;
       }
       
      //Extensification de l'objet etudiant

       $chambre->User = $request->User;
       $chambre->nom = $request->nom;
       $chambre->libelle = $request->libelle;
       $chambre->lit = $request->lit;
       $chambre->baignoire = $request->baignoire;
       $chambre->num_chambre = $request->num_chambre;
       $chambre->num_etage = $request->num_etage;
      //  $chambre->photo = $request->photo;
       $chambre->prix = $request->prix;
       $chambre->statut = $request->statut;
       $chambre->enfant = $request->enfant;
       $chambre->adulte = $request->adulte;


      $chambre->save();

      return redirect('/chambre')->with('status', 'La chambre ajouter avec succès !');
    }

    public function supp_chambre($id)
    {
      $chambres = Chambre::find($id);
      $chambres->delete();
      return redirect('/chambre')->with('supp', 'La chambre supprimer avec succès !');
    }

    public function update_chambre($id)
    {
      $chambres = Chambre::find($id);
      $categories = Categorie::all();
        $users = User::all();
      return view('admin.update', compact('chambres', 'categories', 'users'));
    }
    public function modifier_chambre_traitement(Request $request)
    {
      $request->validate([
        'User' => 'required',
        'nom' => 'required',
        'libelle',
        'lit',
        'baignoire',
        'num_chambre',
        'num_etage',
        'photo',
        'prix',
        'statut',
        'enfant',
        'adulte',
      ]);
       $chambre = Chambre::find($request->id);
       //uplodage
       if(!empty($request->file('photo'))){
        $url = $request->file('photo')->store('uploads/images/chambre', 'public');
        $photo=url('storage/' . $url);
        $chambre['photo'] = $photo;
       }
      //Extensification de l'objet etudiant

       $chambre->User = $request->User;
       $chambre->nom = $request->nom;
       $chambre->libelle = $request->libelle;
       $chambre->lit = $request->lit;
       $chambre->baignoire = $request->baignoire;
       $chambre->num_chambre = $request->num_chambre;
       $chambre->num_etage = $request->num_etage;
      //  $chambre->photo = $request->photo;
       $chambre->prix = $request->prix;
       $chambre->statut = $request->statut;
       $chambre->enfant = $request->enfant;
       $chambre->adulte = $request->adulte;


       $chambre->update();
      return redirect('/chambre')->with('status', 'La chambre modifier avec succès !');
    }

    public function update_statut($id)
  {
    $chambres = Chambre::find($id);
    return view('admin.statut', compact('chambres'));
  }

  public function update_statut_chambre(Request $request)
  {
    $request->validate([
      'statut' => 'required',
    ]);

    $chambre = Chambre::find($request->id);
    $chambre->statut = $request->statut;
    $chambre->update();
    return redirect('/chambre')->with('status', 'statut de la chambre modifier avec succès !');
  }

public function show_chambre($id)
{
  $chambres = Chambre::find($id);
  return view('admin.show_chambre', compact('chambres'));
}
}