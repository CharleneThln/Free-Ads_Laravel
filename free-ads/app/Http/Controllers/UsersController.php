<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;

class UsersController extends Controller
{
    
    public function index() {
        $users = Auth::user();
        $id = $users->id;
        return view('Users.index', compact('users', 'id'));
    }

    public function show(\App\Models\User $user, Request $request) {
        return view('Users.edit', compact('user'));
    }

   /* public function create(Request $request) {
        $id = Auth::user();

        return view('Users.create', compact('id'));
    }*/

    public function store(Request $request) {
        $user = new \App\Models\User();
        $user->name = $request->input('insertName');
        $user->email = $request->input('insertEmail');
        $user->password = hash::make('insertPassword');
        $user->phone = $request->input('insertPhoneNumber');
        $user->nickname = $request->input('insertNickname');
        $user->save();

        return redirect('/Users/');
    }
   

    public function edit(\App\Models\User $user, Request $request) {
        $user = Auth::user();
        return view('Users.edit', compact('user'));
    }

    public function update(\App\Models\User $user, Request $request) {
        $user = Auth::user();
        $user->name = $request->input('insertName');
        $user->email = $request->input('insertEmail');
        $user->phone = $request->input('insertPhone');
        $user->nickname = $request->input('insertNickname');
        $user->save();
        

        return redirect('/Users/'.$user->id);
    }

    public function softdelete($id) {
        
        Auth::logout();
        $deleteuser = User::find($id);
        $deleteuser->delete();
        return redirect('/register/');

    }
}