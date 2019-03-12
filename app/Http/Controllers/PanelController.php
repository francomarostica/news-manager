<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PanelController extends Controller
{
    protected $routeMiddleware = ['auth' => \App\Http\Middleware\Authenticate::class];

    public function index(Request $request)
    {
        if(!Auth::check()){
            return redirect("/login");
        } else {
            //var_dump($request->user()->hasRole('user'));
            $request->user()->authorizeRoles(['admin', 'editor', 'user']);
            return view('panel.index', compact("request"));
        }
    }
}