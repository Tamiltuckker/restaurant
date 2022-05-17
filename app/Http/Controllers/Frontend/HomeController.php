<?php

namespace App\Http\Controllers\Frontend;
use App\Models\Category;
use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Chef;
use App\Models\Product;
use App\Models\Table;
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
         return view('layouts.frontend.index',compact('categories','products','chefs'));
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
        return view('layouts.frontend.aboutus',compact('chefs'));
    }

    public function booking()
    {
    
       $tablesDetails = Table::all();
       
        foreach ($tablesDetails as $key => $value)
        {
            $tables[] = $value->capacity;
        }
        // dd($table);
       return view('layouts.frontend.booking',compact('tables'));
    }
    public function bookingStore(Request $request)
    {
        $booking= new Booking();
        $booking->name = $request->name;
        $booking->email = $request->email;
        $booking->datetime  = date("Y-m-d H:i:s", strtotime(request('datetime')));
        $booking->people_count = $request->people_count;
        $booking->details = $request->details;
        $booking->save();

        return redirect()->route('booking')->with('success','Your table has been Booking Successfully'); 
       
      
    //    return view('layouts.frontend.booking',compact('tables'));
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
