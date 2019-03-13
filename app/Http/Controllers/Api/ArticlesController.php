<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
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
    public function index()
    {
        $articles = Article::orderBy('publish_date', 'desc')->get();
        return $articles;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        if(!Auth::check()){
            return abort("403", "No tienes permiso para realizar esta operación");
        } else {
            request()->user()->authorizeRoles(['admin', 'editor']);
        }
        
        $file = null;
        $title = request()->input('title');
        //validate data
        $validator = \Validator::make(request()->all(), [
            'title' => 'required|min: 5',
            'category_id' =>'required'
        ]);
        if($validator->fails()) return response()->json(['response'=>'error', 'errors'=>$validator->errors()->all()]);
        
        //Verify if category_id exists
        $category_id = Helper::getFriendlyURL(request()->input('category_id'));
        if(!Category::where('url', $category_id)->exists()) {
            return response()->json(['response'=>'error', 'errors'=>['La categoria '.$category_id.' no existe']]);
        }

        $article = new Article();

        //defines article publish date to current date and time
        $article->publish_date = date("Y-m-d H:i:s");

        //check if request has image
        if(request()->hasFile('image')){
            $file = request()->file('image');
            $article->image = $file->getClientOriginalName();
        }

        //set article title
        $article->title = request()->input('title');
        $article->category_id = request()->input('category_id');
        $article->slug = Helper::getFriendlyURL($article->title);

        //save article
        $article->save();
        
        //move article image file (if exists) to assets folder with the article id
        if($file!=null) $file->move(public_path().'/images/articles/'.$article->id.'/', $file->getClientOriginalName());
        
        //return the request
        return response()->json(['response'=>'El registro ha sido agregado']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        $currentCategory="";
        $categories = Category::all();
        //return view('panel.articles.add', compact(['slug', 'categories', 'currentCategory', 'request']));
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
        
        //return redirect("/panel/articles");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(!Auth::check()){
            return abort("403", "No tienes permiso para realizar esta operación");
        } else {
            request()->user()->authorizeRoles(['admin', 'editor']);
        }

        $path = public_path().'/images/articles/'.$id."/";
        $article = Article::find($id);
        if($article!=null){
            $article->delete();
            Storage::deleteDirectory('images/articles/'.$id);
            return response()->json(['response'=>'El registro ha sido borrado']);
        }
    }
}
