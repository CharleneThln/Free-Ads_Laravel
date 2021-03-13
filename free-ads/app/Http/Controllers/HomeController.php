<?php

namespace App\Http\Controllers;

use App\Models\Ad;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use phpDocumentor\Reflection\Types\Nullable;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth'); 
        /////si on commente cette ligne, la page home / ne renvoit plus systématiquement sur la page /login
        //// MAIS DU COUP l'user non identifié ne peut pas voir le détail des annonces car la query attend l'info "is-admin or non ?"
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    { 
        //$ads = \App\Models\Ad::where("users_id","=",$user->id)->get();

        $strRecherche = $request->input("recherche");
        $order = $request->input("order");
        $category = $request->input("category");

        if ($order == "ascPrice") {

            $ads = Ad::join('users', 'users.id', '=', 'ads.users_id')
            ->join('categories', 'ads.categories_id', '=', 'categories.id')
            ->select('ads.*', 'users.nickname', 'categories.name')
            ->orderby('price', 'ASC')
            ->get();
        }
        elseif ($order == "descPrice") {

            $ads = Ad::join('users', 'users.id', '=', 'ads.users_id')
            ->join('categories', 'ads.categories_id', '=', 'categories.id')
            ->select('ads.*', 'users.nickname', 'categories.name')
            ->orderby('price', 'DESC')
            ->get();
        }
        elseif ($order == "publication") {

            $ads = Ad::join('users', 'users.id', '=', 'ads.users_id')
            ->join('categories', 'ads.categories_id', '=', 'categories.id')
            ->select('ads.*', 'users.nickname', 'categories.name')
            ->orderby('ads.updated_at', 'DESC')
            ->get();
        }
        elseif ($category == "services") {

            $ads = Ad::where('ads.categories_id', '1')
            ->join('users', 'users.id', '=', 'ads.users_id')
            ->join('categories', 'ads.categories_id', '=', 'categories.id')
            ->select('ads.*', 'users.nickname', 'categories.name')
            ->get();
        }
        elseif ($category == "jouets") {

            $ads = Ad::where('ads.categories_id', '2')
            ->join('users', 'users.id', '=', 'ads.users_id')
            ->join('categories', 'ads.categories_id', '=', 'categories.id')
            ->select('ads.*', 'users.nickname', 'categories.name')
            ->get();
        }
        elseif ($category == "vehicules") {

            $ads = Ad::where('ads.categories_id', '3')
            ->join('users', 'users.id', '=', 'ads.users_id')
            ->join('categories', 'ads.categories_id', '=', 'categories.id')
            ->select('ads.*', 'users.nickname', 'categories.name')
            ->get();
        }
        elseif ($category == "filmslivres") {

            $ads = Ad::where('ads.categories_id', '4')
            ->join('users', 'users.id', '=', 'ads.users_id')
            ->join('categories', 'ads.categories_id', '=', 'categories.id')
            ->select('ads.*', 'users.nickname', 'categories.name')
            ->get();
        }
        elseif ($category == "informatique") {

            $ads = Ad::where('ads.categories_id', '5')
            ->join('users', 'users.id', '=', 'ads.users_id')
            ->join('categories', 'ads.categories_id', '=', 'categories.id')
            ->select('ads.*', 'users.nickname', 'categories.name')
            ->get();
        }
        elseif ($strRecherche != "") {
            
            $ads = Ad::where("title","like","%".$strRecherche."%")
            ->join('users', 'users.id', '=', 'ads.users_id')
            ->join('categories', 'ads.categories_id', '=', 'categories.id')
            ->select('ads.*', 'users.nickname', 'categories.name')
            ->get();

        } else {
            $ads = \App\Models\Ad::join('categories', 'ads.categories_id', '=', 'categories.id')
            ->join('users', 'users.id', '=', 'ads.users_id')
            ->select('ads.*', 'users.nickname', 'categories.name')
            ->get();
        }

        return view('home', [
            "ads" => $ads,
        ]);
    }
}
