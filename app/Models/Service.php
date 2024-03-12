<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'designation',
        'prix',
    ];
    public function Reservation()
    {
        return $this->belongnToMany(Reservation::class);
    }
    public function User()
    {
        return $this->hasMany(User::class);
    }
}
