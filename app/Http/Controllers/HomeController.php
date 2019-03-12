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

        $primaryArticles = Article::where([
            ['published','=', 1], 
            ['category_id', '<>', 'negocios'], 
            ['outstanding_weight', '=', 1]
        ])
        ->orderBy('publish_date', 'desc')
        ->take(3)
        ->get();

        $outstandingArticles = Article::where([
            ['published','=',1],
            ['outstanding_weight','>',1],
            ['category_id', '<>', 'negocios']
        ])
        ->take(4)
        ->get();

        $businessArticles = Article::where(['published'=>1, 'category_id'=>'negocios'])
        ->take(3)
        ->get();

        return view('index', compact(['primaryArticles', 'outstandingArticles', 'businessArticles', 'categories', 'currentCategory']));
    }

    public function showArticle($slug)
    {   
        $currentCategory="";
        $categories = Category::all();
        return view('article', compact(['slug', 'categories', 'currentCategory']));

        return view('index', compact(['primaryArticles', 'outstandingArticles', 'businessArticles', 'categories', 'currentCategory']));
    }
}
