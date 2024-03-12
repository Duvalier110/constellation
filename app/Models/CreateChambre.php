<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CreateChambre extends Model
{
    use HasFactory;
    protected $fillable = [
        'num_chambre',
        'num_etage',
    ];
}
