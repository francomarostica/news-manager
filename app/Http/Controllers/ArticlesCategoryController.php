<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Article;

class ArticlesCategoryController extends Controller
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
        $articles = Article::where('category_id', $currentCategory)->get();
        return view('articles-category', compact(['categories', 'articles', 'currentCategory']));
    }
}