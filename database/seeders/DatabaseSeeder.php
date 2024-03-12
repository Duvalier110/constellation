<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(LaratrustSeeder::class);
        // \App\Models\User::factory(10)->create();

         \App\Models\User::factory()->create([
             'name' => 'Duvalier',
             'email' => 'ivannoss393@gmail.com',
             'telephone' => '680623711',
             'prenom' => 'Ivan',
             'password' => 'Nossupuwo1',
             'photo' => 'http://localhost:8000/storage/uploads/images/employer/T7rn1iOgW59ivDlDqw8wMAHBXs06Orre0e8AGdGZ.jpg',

            ]);
    }
}
