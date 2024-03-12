<?php

namespace Database\Seeders;

use App\Http\Controllers\AdminController;
use App\Models\User;
use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = new User();
        $admin->name = 'Duvalier';
        $admin->email = 'ivannoss393@gmail.com';
        $admin->password = 'Nossupuwo1';
        $admin->photo = 'http://localhost:8000/storage/uploads/images/employer/T7rn1iOgW59ivDlDqw8wMAHBXs06Orre0e8AGdGZ.jpg';
        $admin->save();
        $role = Role::where('name', 'administrateur')
        ->with('permissions')->first();
        $admin->addRole($role);
        foreach ($role->permissions as $permisson){
            $admin->givePermission($permisson);
        }

    }
}
