<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Booking;
use App\Models\Category;
use App\Models\Chef;
use App\Models\Product;
use App\Models\Table;
use App\Models\AboutUs;
use App\Models\Service;
use App\Models\Content;
use App\Models\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */


    public function index()
    {
       
        $user = Auth::user();
     
        if(!empty($user->getRoleNames()))
      
        foreach($user->getRoleNames() as $v)
     
   
        switch ($v) {
        
          case 'Admin':
                $devices = Category::all();
                return view('backend.categories.index',compact('devices'));
                break;
          case 'subadmin':
                break; 
          default:
          
            $categories=Category::all();
             $products=Product::all();
            $chefs=Chef::all();
            $services=Service::all();
            $contents=Content::all();
            $abouts=AboutUs::all();
            return view('frontend.home',compact('categories','products','chefs','services','contents','abouts'));
           break;
        }
    }
}
