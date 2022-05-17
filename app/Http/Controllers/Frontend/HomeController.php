<?php

namespace App\Http\Controllers\Frontend;
use App\Models\Category;
use App\Http\Controllers\Controller;
use App\Models\AboutUs;
use App\Models\Chef;
use App\Models\Product;
use App\Models\Service;
use App\Models\Content;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $categories=Category::all();
        $products=Product::all();
        $chefs=Chef::all();
        $services=Service::all();
        $contents=Content::all();
        $abouts=AboutUs::all();
  
        return view('layouts.frontend.index',compact('categories','products','chefs','services','contents','abouts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    
     public function show($slug)
     {
         $category = Category::where('slug', $slug)->first();
        return view('layouts.frontend.categoryview')->with('category', $category);
      }

    public function ourteam()
    {
        
        $chefs=Chef::all();
        return view('layouts.frontend.ourteam',compact('chefs'));

    }

    public function aboutUs()
    {
        $chefs=Chef::all();
        $abouts=AboutUs::all();
        return view('layouts.frontend.aboutus',compact('chefs','abouts'));
    }

    public function booking()
    {
       return view('layouts.frontend.booking');
    }

    public function service()
    {
        $services=Service::all();
       return view('layouts.frontend.service',compact('services'));
    }

    public function menu()
    {
        $categories=Category::all();
        $products=Product::all();
       return view('layouts.frontend.menu',compact('categories','products'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
