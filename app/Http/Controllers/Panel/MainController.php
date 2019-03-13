<?php

namespace App\Http\Controllers\Panel;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class MainController extends Controller
{
    public function index(Request $request){
        if(!Auth::check()){
            return redirect("/login");
        } else {
            $request->user()->authorizeRoles(['admin', 'editor', 'user']);
            return redirect("/panel/profile");
        }
    }
}
