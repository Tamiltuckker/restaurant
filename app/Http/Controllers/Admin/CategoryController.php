<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Category;
use App\Models\Attachment;


class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $devices = Category::all();
        return view('backend.categories.index',compact('devices'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
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
       return redirect()->route('webadmin.categories.index')->with('success','New category added Successfully'); 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Category::find($id);
        return view('backend.categories.show',compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $txt = Category::findOrFail($id);
        return view('backend.categories.edit', compact('txt'));
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         Category::find($id)->delete();
        return redirect()->action([CategoryController::class, 'index'])->with('success','deleted Successfully');
    }
}
