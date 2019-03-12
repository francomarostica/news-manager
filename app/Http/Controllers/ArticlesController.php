<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Article;
use App\Category;
use App\Helper;

class ArticlesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $categories = Category::all();
        return view('panel.articles.add', compact(['request', 'categories']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $file = null;
        $article = new Article();

        //defines article publish date to current date and time
        $article->publish_date = date("Y-m-d H:i:s");

        //check if request has image
        if($request->hasFile('image')){
            $file = $request->file('image');
            $article->image = $file->getClientOriginalName();
        }

        //set article title
        $article->title = $request->input('title');
        $article->category_id = $request->input('category_id');
        $article->slug = Helper::getFriendlyURL($article->title);

        //save article
        $article->save();
        
        //move article image file (if exists) to assets folder with the article id
        if($file!=null) $file->move(public_path().'/images/articles/'.$article->id.'/', $file->getClientOriginalName());
        
        //return the request
        return redirect('/panel/articles');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $slug)
    {
        $currentCategory="";
        $categories = Category::all();
        return view('panel.articles.add', compact(['slug', 'categories', 'currentCategory', 'request']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        $article = Article::find($id);
        $categories = Category::all();
        return view('panel.articles.edit', compact(['article', 'categories', 'request']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $article = Article::find($id);
        $article->title = $request->input('title');
        $article->slug = Helper::getFriendlyURL($article->title);
        $article->category_id = $request->input('category_id');
        $article->update();
        
        return redirect("/panel/articles");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $path = public_path().'/images/articles/'.$id."/";
        $article = Article::find($id);
        if($article!=null){
            $article->delete();
            Storage::deleteDirectory('images/articles/'.$id);
            return redirect('/panel/articles');
        }
    }
}
