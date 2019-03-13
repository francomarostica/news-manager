<?php

namespace App\Http\Controllers\Panel;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Article;
use App\Category;

class ArticlesController extends Controller
{
    public function index(Request $request)
    {
        $articles = Article::orderBy('publish_date', 'desc')->get();

        if(!Auth::check()){
            return redirect("/login");
        } else {
            $request->user()->authorizeRoles(['admin', 'editor']);
            return view('panel.articles.index', compact(['request', 'articles']));
        }
    }

    public function create(Request $request)
    {
        $categories = Category::all();
        return view('panel.articles.add', compact(['request', 'categories']));
    }

    public function edit(Request $request, $id)
    {
        $article = Article::find($id);
        $categories = Category::all();
        return view('panel.articles.edit', compact(['article', 'categories', 'request']));
    }
}
