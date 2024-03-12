<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Reservation extends Model
{
    use HasFactory, Notifiable;
    protected  $guarded = [];
    // $fillable = [
    //     'id_chambre',
    //     'num_chambre',
    //     'num_etage',
    //     'nom_client',
    //     'prenom_client',
    //     'email_client' ,
    //     'telephone_client',
    //     'date_debut',
    //     'date_fin'  ,
    //     'heures',
    //     'demande',
    //     'statut',
    // ];


    public function Chambre()
    {
        return $this->hasMany(Chambre::class);
    }
    public function User()
    {
        return $this->hasMany(User::class);
    }
    public function Service()
    {
        return $this->belongnToMany(Service::class);
    }

    public function setStatusAttribute($value)
    {
        $this->attributes['statut']=$value;

        if($value == 'approuver')
        {
            $this->Chambre->update(['statut' => 'occupé']);
        }
    }

}
