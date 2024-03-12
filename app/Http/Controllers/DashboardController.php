<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Chambre;
use App\Models\Reservation;
use App\Models\Service;

class DashboardController extends Controller
{
    public function afficher_dashboard()
    {

        $chambres = Chambre::count();
        $libre = Chambre::where('statut', 'libre')->count();
        $occuper = Chambre::where('statut', 'occuper')->count();
        $reservation = Reservation::count();
        $approuver = Reservation::where('statut', 'Approuver')->count();
        $rejeter = Reservation::where('statut', 'Rejeter')->count();
        $service = Service::count();
        $categorie = Categorie::count();
        return view('/dashboard', compact('chambres', 'categorie', 'libre','occuper', 'approuver','reservation','rejeter','service'));
    }
}
