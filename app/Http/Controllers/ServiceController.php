<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;

class ServiceController extends Controller
{
    public function tableau_service()
    {
        $services = Service::all();
        return view('service.service', compact('services'));
        
    }
    public function ajouter_service(Request $request)
    {
        $request->validate([
            'User' => 'required',
            'name' => 'required',
            'designation' => 'required',
            'prix' => 'required',
        ]);

        //Extensification de l'objet etudiant
        $service = new Service();
        $service->User = $request->User;
        $service->name = $request->name;
        $service->designation = $request->designation;
        $service->prix = $request->prix;
        $service->save();

        return redirect('/service')->with('status', 'Service ajouter avec succès !');
    }
    public function update($id)
    {
        $services = Service::find($id);
        return view('service.updateservice', compact('services'));
    }

    public function modifi_servi_traitement(Request $request)
    {
    
        $request->validate([
            'User' => 'required',
            'name' => 'required',
            'designation' => 'required',
            'prix' => 'required',
        ]);

        //Extensification de l'objet etudiant
        $service =  Service::find($request->id);
        $service->User = $request->User;
        $service->name = $request->name;
        $service->designation = $request->designation;
        $service->prix = $request->prix;
        $service->update();

        return redirect('/service')->with('status', 'Service modifier avec succès !');
    }



    public function delete_service($id)
    {
        $service = Service::find($id);
        $service->delete();
        
            return redirect('/service')->with('supp', 'Service supprimer avec succès !');
    
       
    }

    public function show_service($id)
    {
        $service = Service::find($id);
        return view('service.show_service', compact('service'));
    }
}
