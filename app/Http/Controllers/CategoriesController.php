<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Category;
use App\Helper;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view('panel.categories.add', compact(['request']));
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
        $category = new Category();

        //check if request has image
        if($request->hasFile('image')){
            $file = $request->file('image');
            $category->image = $file->getClientOriginalName();
        } else {
            $category->image="";
        }

        //set article title
        $category->title = $request->input('title');
        $category->url = Helper::getFriendlyURL($category->title);

        //save article
        $category->save();
        
        //move article image file (if exists) to assets folder with the article id
        if($file!=null) $file->move(public_path().'/images/categories/'.$category->id.'/', $file->getClientOriginalName());
        
        //return the request
        return redirect('/panel/categories');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        $category = Category::find($id);
        return view('panel.categories.edit', compact(['category', 'request']));
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
        $category = Category::find($id);
        $category->title = $request->input('title');
        $category->url = Helper::getFriendlyURL($category->title);
        $category->update();
        
        return redirect("/panel/categories");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $path = public_path().'/images/categories/'.$id."/";
        $category = Category::find($id);
        if($category!=null){
            $category->delete();
            Storage::deleteDirectory('images/categories/'.$id);
            return redirect('/panel/categories');
        }
    }
}
