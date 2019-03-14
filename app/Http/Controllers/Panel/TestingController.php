<?php

namespace App\Http\Controllers\Panel;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class TestingController extends Controller
{
    public function index(Request $request){
        if(!Auth::check()){
            return redirect("/login");
        } else {
            $request->user()->authorizeRoles('admin');
            return view('panel.testing', compact(['request']));
        }
    }
}
