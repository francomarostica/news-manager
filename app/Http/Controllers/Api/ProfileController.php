<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProfileController extends Controller
{
    public function update()
    {
        if(!Auth::check()){
            return abort("403", "No tienes permiso para realizar esta operación");
        } else {
            request()->user()->authorizeRoles(['admin', 'editor', 'user']);
        }
        
        
        //return the request
        return response()->json(['response'=>'El registro ha sido agregado']);
    }
}
