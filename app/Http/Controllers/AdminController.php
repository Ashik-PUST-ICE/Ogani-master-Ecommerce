<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use App\Models\Order;
use Flasher\Laravel\Facade\Flasher;
use Barryvdh\DomPDF\Facade\Pdf;



class AdminController extends Controller
{
    public function view_category()


    {   $data=Category::all();
        return view('admin.category',compact('data'));
    }

    public function add_category(Request $request)
    {
        // Create and save the new category
        $category = new Category();
        $category->category_name = $request->input('category');
        $category->save();

        // Add a success message with a timeout option (in milliseconds)
        Flasher::addSuccess('Category Added Successfully.', ['timeout' => 10000]); // 3000ms = 3 seconds

        return redirect()->back();


    }

    public function delete_category($id)
    {
        $category = Category::find($id);

        if ($category) {
            $category->delete();
            Flasher::addSuccess('Category Deleted Successfully.', ['timeout' => 10000]);
        } else {
            Flasher::addError('Category not found.', ['timeout' => 10000]);
        }

        return redirect()->back();
    }


    public function edit_category($id)
    {
        $data=Category::find($id);
        return view('admin.edit_category',compact('data'));
    }

    public function update_category(Request $request, $id)
    {
        $data = Category::find($id);

        if ($data) {
            $data->category_name = $request->input('category');
            $data->save();
            return redirect('/view_category')->with('success', 'Category updated successfully.');
        } else {
            return redirect('/view_category')->with('error', 'Category not found.');
        }
    }

public function add_product()
{

    $category=Category::all();
    return view('admin.add_product',compact('category'));
}


public function upload_product( Request $request)
{
 $data=new Product;
 $data->title= $request->title;
 $data->price= $request->price;

 $data->description= $request->description;
 $data->quantity= $request->qty;
 $data->category= $request->category;


 $image=$request->image;
 if($image)
 {
    $imagename = time().'.'.$image->getClientOriginalExtension();
    $request->image->move('products',$imagename);

    $data->image = $imagename;
 }
 $data->save();

 Flasher::addSuccess('Category Added Successfully.', ['timeout' => 1000]); // 3000ms = 3 seconds

 return redirect()->back();

}

public function view_product()
{
    $products = Product::all(); // Fetching all products
    return view('admin.view_product', compact('products')); // Passing 'products' to the view
}
public function delete_product($id)
{
    // Fetch the product using the provided ID
    $product = Product::find($id);

    if ($product) {
        // Get the image path
        $image_path = public_path('products/' . $product->image);

        // Check if the image exists in the file system and delete it
        if (file_exists($image_path)) {
            unlink($image_path); // Delete the image file
        }

        // Delete the product from the database
        $product->delete();

        // Add success flash message
        Flasher::addSuccess('Product deleted successfully.', ['timeout' => 1000]);
    } else {
        // Add error flash message if the product is not found
        Flasher::addError('Product not found.');
    }

    // Redirect back to the previous page
    return redirect()->back();
}

public function update_product($id)
{
    $data = Product::find($id);

    $category = Category :: all();

    // dd($product); // Check if product data is being retrieved

    return view('admin.update_page',compact('data','category'));
}

public function edit_product(Request $request , $id)
{
    $data = Product::find($id);

    $data->title= $request->title;

    $data->description= $request->description;

    $data->price= $request->price;

    $data->quantity= $request->quantity;

    $data->category= $request->category;

  $image = $request->image;
   if ($image)
   {
    $imagename = time().'.'.$image->getClientOriginalExtension();
    $request->image->move('products',$imagename);

    $data->image = $imagename;
   }

  $data->save();

 Flasher::addSuccess('Updated Successfully.', ['timeout' => 1000]); // 3000ms = 3 seconds

return redirect('/view_product');

}
public function product_search(Request $request)
{
    $search = $request->input('search');
    $products = Product::where('title', 'LIKE', '%' . $search . '%')->
    onWhere('category', 'LIKE', '%' . $search . '%')->paginate(3);
    return view('admin.view_product', compact('products'));
}

public function view_order()
{

    $data = Order::all();
    return view('admin.order',compact('data'));
}

public function on_the_way($id)
{
    $data= Order:: find($id);

    $data->status= 'On the Way';
    $data->save();
    return redirect('view_order');

}

public function delivered($id)
{
    $data= Order:: find($id);

    $data->status= 'Delivered';
    $data->save();
    return redirect('view_order');

}

public function print_pdf($id)

{
    $data = Order::find($id);
    $pdf = Pdf::loadView('admin.invoice',compact('data'));

    return $pdf->download('invoice.pdf');

}

}
