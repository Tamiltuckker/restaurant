<?php

namespace App\Http\Controllers;

use App\Models\Attachment;
use Illuminate\Foundation\Validation\ValidatesRequests;
use passes;
use Illuminate\Support\Facades\Validator; 
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Str;
use Cviebrock\EloquentSluggable\Services\SlugService;

class CategoryController extends BaseController
{
    use ValidatesRequests;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $devices=Category::all();
        
        return view('category/index',compact('devices'));
     }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         return view('category/create');
    }

    

    public function store(Request $request)
    {
      
            $category= new Category;

              $category->name = $request->name;
              $category->slug = Str::slug($request->name);
              $category->save();
              $id= $category->id;

              $attachment=Category::find($id);
              $image= new Attachment;
              $imagestore = ($request->file('image'))->store('uploads','public');
              $image->attachmentable_image = $imagestore;
              $attachment->image()->save($image);
             return redirect()->action([CategoryController::class, 'index'])->with('success','New category added Successfully'); 
      
        }
    

    
   

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */

    public function show($id)
    {
 
         $data = Category::find($id);
        //  dd($data);
         return view('category/show',compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      
        $txt = Category::findOrFail($id);
        return view('category/edit', compact('txt'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update($id, Request $request)
    {
        
      
         $update = ['name' => $request->name];
         if ($files = $request->file('image')) {
         $profileImage =  $files->store('uploads','public');
         $update['image'] = "$profileImage";
           }
         Category::where('id',$id)->update($update);
         return redirect()->action([CategoryController::class, 'index'])->with('success','Update Successfully');
     }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
      
       
        Category::find($id)->delete();
        return redirect()->action([CategoryController::class, 'index'])->with('success','deleted Successfully');
       
    }
}
