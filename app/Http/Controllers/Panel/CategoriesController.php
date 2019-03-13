<?php

namespace App\Http\Controllers\Panel;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Category;
use Illuminate\Support\Facades\Auth;

class CategoriesController extends Controller
{
    public function index(Request $request)
    {
        $categories = Category::all();

        if(!Auth::check()){
            return redirect("/login");
        } else {
            $request->user()->authorizeRoles(['admin', 'editor']);
            return view('panel.categories.index', compact(['request', 'categories']));
        }
    }
    
    public function create(Request $request)
    {
        return view('panel.categories.add', compact(['request']));
    }

    public function edit(Request $request, $id)
    {
        $category = Category::find($id);
        return view('panel.categories.edit', compact(['category', 'request']));
    }
}
