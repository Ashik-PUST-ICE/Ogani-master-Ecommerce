<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;
use App\Models\Cart;
use App\Models\User;
use App\Models\Order;
use Flasher\Laravel\Facade\Flasher;


use Illuminate\Http\Request;
use App\Models\Category; // Import the Category model

class HomeController extends Controller
{
    // public function index()
    // {

    //     return view('admin.dashboard');
    // }
    public function index()
    {
        $user= User::where('usertype','user')->get()->count();

        $product= Product::all()->count();

        $order= Order::all()->count();

        $delivered= Order::where('status','Delivered')->get()->count();


        return view('admin.index',compact('user','product','order','delivered'));
    }


        public function user()
        {   $products = Product::all();
            $data = Category::all();
            $count = 0;
            if (Auth::check()) { // Check if user is authenticated
                $user = Auth::user();
                $userid = $user->id;

                // Query the Cart model correctly
                $count = Cart::where('user_id', $userid)->count();
            }
            return view('user.index',compact('products','data','count'));
        }// Ensure this view exists

        public function login_user()
        {
            $products = Product::all();
            $data = Category::all();

            $user = Auth:: user();

            if ($user) { // Check if user is authenticated
                $userid = $user->id;

                // Corrected the way to query the Cart model
                $count = Cart::where('user_id', $userid)->count();
            } else {
                $count = 0; // Handle the case when no user is authenticated
            }

            return view('user.index',compact('products','data','count'));
        }
}
