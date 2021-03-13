<?php

namespace App\Http\Controllers;

use App\Models\Ad;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AdController extends Controller
{

    public function index(Request $request) {

        $user = Auth::user();
        $strRecherche = $request->input("recherche");

        if ($strRecherche == "") {
            if($user->is_admin != 0) {
                $ads = Ad::join('users', 'users.id', '=', 'ads.users_id')
                ->select('ads.*', 'users.nickname')
                ->get();
            } else {
                $ads = Ad::where("users_id","=",$user->id)
                ->join('users', 'users.id', '=', 'ads.users_id')
                ->select('ads.*', 'users.nickname')
                ->get();
            }
        }
        else {
            if($user->is_admin != 0) {
                $ads = Ad::where("title","like","%".$strRecherche."%")
                ->join('users', 'users.id', '=', 'ads.users_id')
                ->select('ads.*', 'users.nickname')
                ->get();
            } else {
                $ads = Ad::where("title","like","%".$strRecherche."%")
                ->where("users_id","=",$user->id)
                ->join('users', 'users.id', '=', 'ads.users_id')
                ->select('ads.*', 'users.nickname')
                ->get();
            }
        }

        return view('ads.index', compact('ads', 'user'));
    }

    public function show(\App\Models\Ad $ad, Request $request) {

        $user = Auth::user();
        $canEdit = ($user->is_admin != 0) || ($ad->users_id == $user->id);
        return view('ads.details', compact("ad", "user", "canEdit"));
    }

    public function create() {
        //$categories_id = \App\Models\Ad::distinct()->get(["categories_id"]);
        //$ads = Ad::all();

        return view('ads.create');
    }

    public function store(Request $request) {
        $ad = new \App\Models\Ad();
        $ad->image = $request->input('insertImage');
        $ad->title = $request->input('insertTitle');
        $ad->categories_id = $request->input('insertCategories_id');
        $ad->content = $request->input('insertContent');
        $ad->slug = $request->input('insertSlug');
        $ad->price = $request->input('insertPrice');
        $ad->location = $request->input('insertLocation');
        $ad->users_id = Auth::user()->id;
        $ad->save();

        return redirect('/ads/');
    }

    public function edit(\App\Models\Ad $ad, Request $request) {

        $user = Auth::user();
        $canEdit = ($user->is_admin != 0) || ($ad->users_id == $user->id);
        if ($canEdit) {
            return view('ads.edit', compact('ad'));
        }
        else {
            return view('ads.details', compact("ad", "user", "canEdit"));
            //return view('403');
        }
    }

    public function update(\App\Models\Ad $ad, Request $request) {
        $ad->image = $request->input('insertImage');
        $ad->title = $request->input('insertTitle');
        $ad->categories_id = $request->input('insertCategories_id');
        $ad->content = $request->input('insertContent');
        $ad->slug = $request->input('insertSlug');
        $ad->price = $request->input('insertPrice');
        $ad->location = $request->input('insertLocation');
        $ad->save();

        return redirect('/ads/'.$ad->id);
    }

    public function softdelete(\App\Models\Ad $ad, Request $request) {

        $user = Auth::user();
        $canEdit = ($user->is_admin != 0) || ($ad->users_id == $user->id);
        if ($canEdit) {
            $ad->delete();
            return redirect('/ads');
        }
        else {
            return redirect('/ads');
            //return view('403');
        }

    }
}



