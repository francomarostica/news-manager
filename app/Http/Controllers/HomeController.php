<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Article;

class HomeController extends Controller
{
    /**
     * Returns the main view for NewsManager site
     *
     * @param string $currentCategory
     * @return View
     */
    public function index($currentCategory="")
    {
        $categories = Category::all();
        $articles = Article::where('published', 1)
            ->orderBy('id', 'desc')
            ->take(7)
            ->get();
        return view('index', compact(['categories', 'articles', 'currentCategory']));
    }
}
