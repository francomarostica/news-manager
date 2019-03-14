<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;
use App\Category;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index($currentCategory="")
    {   
        $categories = Category::all();

        $primaryArticle = Article::where([
            ['state','=', "PUBLISHED"], 
            ['category_id', '<>', 'negocios'], 
            ['outstanding_weight', '=', 1]
        ])
        ->orderBy('id', 'desc')
        ->first();

        $secondaryArticles = Article::where([
            ['state','=', "PUBLISHED"], 
            ['outstanding_weight','=',2],
            ['category_id', '<>', 'negocios']
        ])
        ->take(4)
        ->get();

        $businessArticles = Article::where([
            ['state','=', "PUBLISHED"], 
            ['outstanding_weight','=',3],
            ['category_id', '<>', 'negocios']
        ])
        ->take(4)
        ->get();

        return view('index', compact([
            'primaryArticle', 
            'secondaryArticles', 
            'businessArticles', 
            'categories', 
            'currentCategory'])
        );
    }

    public function showArticle($slug)
    {   
        $currentCategory="";
        $categories = Category::all();
        return view('article', compact(['slug', 'categories', 'currentCategory']));

        return view('index', compact(['primaryArticles', 'outstandingArticles', 'businessArticles', 'categories', 'currentCategory']));
    }
}
