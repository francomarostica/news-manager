<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\User;

class ProfileController extends Controller
{
    public function update()
    {
        if(!Auth::check()){
            return abort("403", "No tienes permiso para realizar esta operación");
        } else {
            request()->user()->authorizeRoles(['admin', 'editor', 'user']);
        }
        
        $user = request()->user();
        $user->name = request()->input('name');
        $user->last_name = request()->input('last_name');
        $user->email = request()->input('email');
        $user->image = "";
        $user->update();

        //return the request
        return response()->json(['response'=>'El registro ha sido actualizado']);
    }
}
