<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Role;
use App\Models\User;

class RoleController extends Controller
{
    public function tableau_role()
    {
        $roles = Role::all();
        $users = User::all();
        return view('role.role', compact('roles','users'));
    }

    public function ajouter_role(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'designation' => 'required',
            'User' => 'required',
        ]);

        //Extensification de l'objet etudiant
        $role = new Role();
        $role->name = $request->name;
        $role->designation = $request->designation;
        $role->User = $request->User;
        $role->save();

        return redirect('/role');
    }

    public function update_role($id)
    {
        $roles = Role::find($id);
        return view('role.updaterole', compact('roles'));
    }

    public function modifier_role_traitement(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'designation' => 'required',
            'User' => 'required',
        ]);

        //Extensification de l'objet etudiant
        $role = Role::find($request->id);
        $role->name = $request->name;
        $role->designation = $request->designation;
        $role->User = $request->User;
        $role->update();

        return redirect('/role');
    }

    public function delete_role($id)
    {
        $role = Role::find($id);
        $role->delete();
        return redirect('/role');
    }
}
