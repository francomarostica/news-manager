<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Category;
use App\Helper;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
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
            'title' => 'required'
        ]);
        if($validator->fails()) return response()->json(['response'=>'error', 'errors'=>$validator->errors()->all()]);
        
        $category = new Category();

        //check if request has image
        if(request()->hasFile('image')){
            $file = request()->file('image');
            $category->image = $file->getClientOriginalName();
        } else {
            $category->image="";
        }

        //set article title
        $category->title = request()->input('title');
        $category->url = Helper::getFriendlyURL($category->title);

        //save article
        $category->save();
        
        //move article image file (if exists) to assets folder with the article id
        if($file!=null) $file->move(public_path().'/images/categories/'.$category->id.'/', $file->getClientOriginalName());
        
        //return the request
        return response()->json(['response'=>'El registro ha sido agregado']);
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
        
        return response()->json(['response'=>'El registro se ha guardado correctamente']);
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

        $path = public_path().'/images/categories/'.$id."/";
        $category = Category::find($id);
        if($category!=null){
            $category->delete();
            Storage::deleteDirectory('images/categories/'.$id);
            return response()->json(['response'=>'El registro ha sido borrado']);
        }
    }
}
