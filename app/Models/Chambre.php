<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chambre extends Model
{
    use HasFactory;

    public function Categorie()
    {
        return $this->hasMany(Categorie::class);
    }
    public function User()
    {
        return $this->hasMany(User::class);
    }
    protected $guarded = [];
    //  $fillable = [
    //     'name',
    //     'nom',
    //     'libelle',
    //     'baignoire',
    //     'lit',
    //     'num_chambre',
    //     'num_etage',
    //     'photo1',
    //     'photo2',
    //     'photo3',
    //     'photo4',
    //     'prix',
    //     'statut',
    //     'enfant',
    //     'adulte',
    // ];
    public function reservation()
    {
        return $this->hasOne(Reservation::class);
    }
}
