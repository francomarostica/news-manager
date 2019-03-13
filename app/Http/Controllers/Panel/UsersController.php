<?php

namespace App\Http\Controllers\Panel;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\User;

class UsersController extends Controller
{
    public function index(Request $request)
    {
        $users = User::all();

        if(!Auth::check()){
            return redirect("/login");
        } else {
            $request->user()->authorizeRoles('admin');
            return view('panel.users.index', compact(['request', 'users']));
        }
    }
}
