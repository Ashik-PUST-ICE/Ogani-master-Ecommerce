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

        public function shop()
        {
            // Fetch all products
            $products = Product::all();
            $data = Category::all();
            // You can adjust this if you want the latest products

            // Initialize cart count variable
            $count = 0;

            // Check if the user is authenticated
            if (Auth::check()) {
                $user = Auth::user();
                $userid = $user->id;

                // Count the items in the cart for the authenticated user
                $count = Cart::where('user_id', $userid)->count();
            }

            // Return the shop view with products and cart count
            return view('user.shop', compact('products', 'data','count'));
        }
        public function add_cart($id)
        {
            //    return view('home.add_cart');

            $product_id=$id;
            $user= Auth::user();
            $user_id= $user->id;

            $data = new Cart;

            $data->user_id=$user_id;

            $data->product_id=$product_id;

            $data->save();


           Flasher::addSuccess('Add to Cart Successfully.', ['timeout' => 2000]); // 3000ms = 3 seconds

            return redirect()->back();


        }
        public function mycart()
    {
        $cart = [];
        $count = 0;
        $data = Category::all();
        // $data = Category::all();

        if (Auth::check()) { // Check if user is authenticated
            $user = Auth::user();
            $userid = $user->id;

            // Get the user's cart items and count
            $cart = Cart::where('user_id', $userid)->get();
            $count = $cart->count();
        } else {
            // Redirect to login if user is not authenticated
            return redirect()->route('login')->with('error', 'Please login to view your cart.');
        }


        return view('user.mycart', compact('count','data','cart'));
    }

    public function removeItem($id)
    {
        $cartItem = Cart::findOrFail($id);


        // Ensure user is authenticated
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Please log in to manage your cart.');
        }

        // Ensure that the item belongs to the authenticated user
        if ($cartItem->user_id != Auth::id()) {
            return redirect()->back()->with('error', 'You are not authorized to remove this item.');
        }

        // Remove the item
        $cartItem->delete();

        Flasher::addSuccess('Remove Successfully.', ['timeout' => 2000]); // 3000ms = 3 seconds


        return redirect()->back();
    }

    public function product_details($id)
    {

        $products= Product :: find($id);
        $data = Category::all();



        $user = Auth:: user();

        if ($user) { // Check if user is authenticated
            $userid = $user->id;

            // Corrected the way to query the Cart model
            $count = Cart::where('user_id', $userid)->count();
        } else {
            $count = 0; // Handle the case when no user is authenticated
        }
        return view('user.product_details',compact('data','products','count'));
    }

    public function checkout()
{
    $data = Category::all();
    $cart = [];
        $count = 0;

        if (Auth::check()) { // Check if user is authenticated
            $user = Auth::user();
            $userid = $user->id;

            // Get the user's cart items and count
            $cart = Cart::where('user_id', $userid)->get();
            $count = $cart->count();
        } else {
            // Redirect to login if user is not authenticated
            return redirect()->route('login')->with('error', 'Please login to view your cart.');
        }


    return view('user.checkout', compact('data', 'cart', 'count'));
}




public function confirm_order(Request $request)
    {
        $name = $request->name;

        $address = $request->address;

        $phone = $request->phone;

        $userid = Auth::user()->id;

        $cart = Cart::where('user_id',$userid)->get();

        foreach($cart as $carts)
        {
            $order= new Order;

            $order->name = $name;

            $order->rec_address = $address;

            $order->phone = $phone;

            $order->user_id =$userid;

            $order->product_id= $carts->product_id;

            $order->save();


        }

        $cart_remove= Cart::where('user_id',$userid)->get();

        foreach($cart_remove as $remove)
        {
                $data = Cart::find($remove->id);
                $data->delete();
        }

        Flasher::addSuccess('Order Successfully.', ['timeout' => 1000]); // 3000ms = 3 seconds
        return redirect()->back();


    }


}
