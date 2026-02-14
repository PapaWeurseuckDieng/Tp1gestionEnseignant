<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Enseignant extends Model
{
    //Configuration du modèle Eloquent avec protection des champs.
    protected $fillable = [
        'matricule',
        'nom',
        'prenom',
        'email',
        'telephone',
        'grade',
        'departement',
        'statut',
    ];  


}
