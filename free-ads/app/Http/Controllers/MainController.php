<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MainController extends Controller
{
    //Méthode pour la page d'accueil
    public function bonjour($prenom) {
        echo "Bonjour $prenom !";
    }
}
