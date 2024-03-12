<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reservation;
use App\Models\Chambre;
use App\Notifications\Approuvation;
use Illuminate\Support\Facades\Validator;
use App\Notifications\HotelRejet;
use App\Notifications\HotelValidation;
use App\Notifications\SendNotification;
use Exception;
use PhpParser\Node\Stmt\Else_;


class ReservationController extends Controller
{
    public function afficher_reservation($id)
    {
        $chambres = Chambre::all();
        $chambres = Chambre::find($id);
        return view('presentation.reservation', compact('chambres'));
    }

    public function ajouter_reservation(Request $request)
{
    $request->validate([
        'User',
        'Chambre' => 'required',
        'num_chambre' => 'required',
        'num_etage' => 'required',
        'prix_chambre' => 'required',
        'prenom_client' => 'required',
        'nom_client' => 'required',
        'email'  => 'required',
        'telephone_client' => 'required',
        'date_debut' => 'required',
        'date_fin'   => 'required',
        'prix'   => 'required',
        'heur'   => 'required',
        'demande',
        'statut' => 'required',
    ]);

    $existingReservation = Reservation::where('Chambre', $request->Chambre)
    ->where(function ($query) use ($request) {
        $query->whereBetween('date_debut', [$request->date_debut, $request->date_fin])
              ->orWhereBetween('date_fin', [$request->date_debut, $request->date_fin])
              ->where('statut', 'Approuver');
    })->first();


if (!empty($existingReservation)) {
    return redirect('/room')->with('error', 'Cette chambre est déjà réservée pour la période demandée !');
} else {
    $reservation = new Reservation();
    $reservation->User = $request->User;
    $reservation->Chambre = $request->Chambre;
    $reservation->num_chambre = $request->num_chambre;
    $reservation->num_etage = $request->num_etage;
    $reservation->prix = $request->prix_chambre;
    $reservation->prenom_client = $request->prenom_client;
    $reservation->nom_client = $request->nom_client;
    $reservation->email = $request->email;
    $reservation->telephone_client = $request->telephone_client;
    $reservation->date_debut = $request->date_debut;
    $reservation->date_fin = $request->date_fin;
    $reservation->total = $request->prix;
    $reservation->heur = $request->heur;
    $reservation->demande = $request->demande;
    $reservation->statut = $request->statut;
     $reservation->save();
     $reservation->notify(new SendNotification);
    return redirect('/room')->with('status', 'Demande de réservation envoyée avec succès !');
}


}

    public function carracteristique_chambre($id)
    {
        $chambres = Chambre::find($id);
        return view('presentation.carracteristique', compact('chambres'));
    }

    public function afficher_demande_reservation()
    {
        $reservations = Reservation::all();
        return view('admin.demande', compact('reservations'));
    }

    public function valid_demande($id)
    {
        $reservations = Reservation::find($id);
        return view('admin.valide', compact('reservations'));
    }

    public function valider_reservation(Request $request)
    {
        $request->validate([
            'statut' => 'required',
        ]);
        $reservation = Reservation::find($request->id);
        $reservation->statut = $request->statut;
        
        $reservation->update();


           if ($request->statut == "Approuver") {
               $reservation->notify(new HotelValidation);
           }
           Else {
               $reservation->notify(new HotelRejet);
           }


        return redirect('/demande')->with('status', 'vous avez modifier avec succès le statut de la demande !');
    }
    public function show_demande($id)
    {
        $demande = Reservation::find($id);
        return view('admin.show_deamande', compact('demande'));
    }
}
