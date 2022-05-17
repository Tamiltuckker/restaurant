<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Attachment;
use App\Models\Category;
use App\Models\Product;
use App\Models\Tag;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();
        return view('backend.products.index',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all()->sortBy('name', SORT_NATURAL | SORT_FLAG_CASE)->pluck('name', 'id');
        $product =   Product::all()->sortBy('name', SORT_NATURAL | SORT_FLAG_CASE)->pluck('name', 'id');
        $tags =   Tag::all()->sortBy('name', SORT_NATURAL | SORT_FLAG_CASE)->pluck('name', 'id');

        return view('backend.products.create',compact('categories','product','tags'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $product= new Product();
        $product->name = $request->name;
        $product->category_id = $request->category_id;
        $product->price = $request->price;
        $product->slug = Str::slug($request->name);
        $product->description = $request->description;
        $product->save();
        $id= $product->id;

        $attachment=Product::find($id);
        $image = new Attachment();
        $imagestore = ($request->file('image'))->store('uploads','public');
        $image->attachmentable_image = $imagestore;
        $attachment->image()->save($image);

        $product->tags()->sync($request->input('tags'));

        return redirect()->route('webadmin.products.index')->with('success','New Products added Successfully'); 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::find($id);
        return view('backend.products.show',compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categories = Category::all()->sortBy('name', SORT_NATURAL | SORT_FLAG_CASE)->pluck('name', 'id');
        $product = Product::findOrFail($id);
        $tags =   Tag::all()->sortBy('name', SORT_NATURAL | SORT_FLAG_CASE)->pluck('name', 'id');
        return view('backend.products.edit', compact('product','categories','tags'));
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
        $product = Product::find($id);
        $product->name = $request->input('name');
        $product->slug = Str::slug($request->name);
        $product->price = $request->input('price');
        $product->description = $request->input('description');;
        $product->update();
       
        if ($files = $request->file('image')) {
            Attachment::where('attachmentable_id', $product->id)->delete();
            $attachment = new Attachment;
            $imagestore = ($request->file('image'))->store('uploads','public');
            $attachment->attachmentable_image = $imagestore;
            $product->image()->save($attachment);
        }
        $product->tags()->sync($request->input('tags'));

        return redirect()->action([ProductController::class, 'index'])->with('success','Update Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $Product)
    {
        $Product->delete();
        return redirect()->action([ProductController::class, 'index'])->with('success','deleted Successfully');
    }
}
