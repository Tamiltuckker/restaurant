<?php

namespace App\Http\Controllers\Frontend;
use App\Models\Category;
use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Chef;
use App\Models\Product;
use App\Models\Table;
use App\Models\AboutUs;
use App\Models\Service;
use App\Models\Content;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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

        $tablesDetails = Table::all();
        foreach ($tablesDetails as $key => $value)
        {
            $tables[] = $value->capacity;
        }
       return view('layouts.frontend.booking',compact('tables'));
    }
    public function bookingStore(Request $request)
    {
        $bookingCount = Booking::where('date', '>' ,DB::raw('DATE_SUB(NOW(), INTERVAL 1 DAY)'))->count();
        if($bookingCount > 10)
        {
            $booking= new Booking();
            $booking->name = $request->name;
            $booking->email = $request->email;
            $booking->date  = date("Y-m-d", strtotime(request('date')));
            $booking->people_count = $request->people_count;
            $booking->details = $request->details;
            $booking->save();
            return redirect()->route('booking')->with('success','Your table has been Booking Successfully');   
        }
        else
        {   
            return redirect()->route('booking')->with('success','Sorry All Tables booked Today, Kindly Choose to another Date');   
        }
        
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
