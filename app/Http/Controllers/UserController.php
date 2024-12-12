<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category; // Import the Category model


class UserController extends Controller
{
    public function index ()
    {  $data = Category::all();
        return view('user.index',compact('data'));
    }
}
