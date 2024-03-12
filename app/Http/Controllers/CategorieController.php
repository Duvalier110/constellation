<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categorie;
use App\Models\User;
use App\Notifications\ContactNotification;


class CategorieController extends Controller
{
    public function tableau_categorie()
    {
         $categories = Categorie::all();
         $users = User::all();
         return view('categorie.categorie', compact('categories','users'));
    }
    public function ajouter_categorie(Request $request)
    {
      $request->validate([
        'User' => 'required',
        'nom' => 'required',
        'libelle' => 'required',
        'photo' => 'required',
      ]);
      //Extensification de l'objet etudiant
      $categorie = new Categorie();
      
      //uplodage
      if(!empty($request->file('photo'))){
        $url = $request->file('photo')->store('uploads/images/chambre', 'public');
        $photo=url('storage/' . $url);
        $categorie['photo'] = $photo;
       }

       $categorie->User = $request->User;
       $categorie->nom = $request->nom;
       $categorie->libelle = $request->libelle;
       $categorie->save();

       if($categorie) {
        $categorie->notify(new ContactNotification());
      }

      return redirect('/categorie')->with('status', 'Categorie ajouter avec succès !');;
    }

    public function delete_categorie($id)
    {
      $categories = Categorie::find($id);
      $categories->delete();
      return redirect('/categorie')->with('supp', 'Categorie supprimer avec succès !');;
    }

    public function update_categorie($id)
    {
      $categories = Categorie::find($id);
      return view('categorie.updatecategorie', compact('categories'));
    }
    public function modifier_categorie_traitement(Request $request)
    {
        $request->validate([
            'User' => 'required',
            'nom' => 'required',
            'libelle' => 'required',
          ]);

          //Extensification de l'objet etudiant
          $categorie = Categorie::find($request->id);
           $categorie->User = $request->User;
           $categorie->nom = $request->nom;
           $categorie->libelle = $request->libelle;
          $categorie->update();

          return redirect('/categorie')->with('status', 'Categorie modifier avec succès !');


       }

       public function show_categorie($id)
       {
        $categorie = Categorie::find($id);
        return view('categorie.show_categorie', compact('categorie'));
       }

}
