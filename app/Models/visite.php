<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class visite extends Model
{
     protected $fillable = [
        'nom_visiteur',
        'entreprise',
        'personne_rencontree',
        'motif',
        'heure_arrivee',
        'heure_depart',
        'statut',
    ];
    function client(){
        return $this->belongsTo(Client::class);
    }
}
