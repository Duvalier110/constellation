<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\Reservation;
use App\Models\User;




use Illuminate\Http\Request;

class VitrineController extends Controller
{
    public function aff_serv()
    {
        return view('vitrine.services');
    }

    public function aff_propos()
    {
        return view('vitrine.propos');
    }

    public function aff_equipe()
    {
        return view('vitrine.equipe');
    }

    public function aff_temoignage()
    {
        return view('vitrine.temoignage');
    }
    public function aff_historique()
    {

        $user_id = auth()->id();
        $reservations = Reservation::where('User', $user_id)->get();
        return view('presentation.historique', compact('reservations'));
    }
    public function aff_complet()
    {

        $user_id = auth()->id();
        $reservations = Reservation::where('User', $user_id)->get();
        return view('presentation.complet', compact('reservations,'));

    }

    public function carracteristique_demande($id)
    {
        $demande = Reservation::find($id);
        return view('presentation.caracteristique_demande', compact('demande'));
    }
    public function update_demande($id)
    {
        $reservation = Reservation::find($id);
        return view('presentation.updatereserv', compact('reservation'));
    }

    public function update_demande_reserv(Request $request)
    {
        $request->validate([

            'prix' => 'required',
            'prenom_client' => 'required',
            'nom_client' => 'required',
            'email'  => 'required',
            'telephone_client' => 'required',
            'date_debut' => 'required',
            'date_fin'   => 'required',
            'prix'   => 'required',
            'heur'   => 'required',
            'demande',

        ]);

        $reservation =Reservation::find($request->id);
        $reservation -> prix = $request->prix_chambre;
        $reservation -> prenom_client = $request->prenom_client;
        $reservation -> nom_client = $request->nom_client;
        $reservation -> email = $request->email;
        $reservation -> telephone_client = $request->telephone_client;
        $reservation -> date_debut = $request->date_debut;
        $reservation -> date_fin = $request->date_fin;
        $reservation -> total = $request->prix;
        $reservation -> heur = $request->heur;
        $reservation -> demande = $request->demande;
        $reservation->update();


        return redirect('/historique')->with('status', 'Votre demande de réservation a été modifier avec succès !');
    }
}
