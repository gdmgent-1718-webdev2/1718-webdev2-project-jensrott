<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Product;
use App\Category;
use App\User;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    protected $title = 'Products';

    public function index()
    {
        $title = $this->title;
        $products = Product::all()->sortByDesc('name');
        return view('products.index', compact('title', 'products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::all();
        $categories = Category::all();
        $title = $this->title;
        return view('products.create', compact('title', 'categories', 'users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            //'picture' => 'required|string|max:50',
            'start_of_bid_period' => 'required|date',
            'end_of_bid_period' => 'required|date',
            'user_id' => 'required|string',
            'category_id' => 'required|string',
        ]);


        if($request->hasFile('picture')) {
            $fileNameWithExt = $request->file('picture')->getClientOriginalName(); // Dit zet de exacte file naam in een var

            // Get just filename
            $filename = pathinfo($fileNameWithExt, PATHINFO_FILENAME); // Standaard php geen Laravel

            // Get just extension
            $extension = $request->file('picture')->getClientOriginalExtension();

            // Filename to store, alles samengevoegd in 1 var
            $fileNameToStore = $filename . '_' . time() . '.' . $extension;

            // Upload the image
            $path = $request->file('picture')->storeAs('images/', $fileNameToStore); // Saven in /storage/app/public/images
        } else {
            $fileNameToStore = 'noimage.jpg';
        }


        //$product = Product::create($request->all());
        $product = Product::create([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
           // 'picture' => $request->input('picture'),
           'picture' => "/storage/images/". $fileNameToStore, // href in view is /public/storage/images , which points to /storage/app/public/images
            'start_of_bid_period' => $request->input('start_of_bid_period'),
            'end_of_bid_period' => $request->input('end_of_bid_period'),
            'user_id' => $request->input('user_id'),
            'category_id' => $request->input('category_id'),
        ]);
        //$product->save();
        compact('product');
        $request->session()->flash('alert-danger', 'Product was successful added!');
        return redirect('/products');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $title = $this->title;
        $product = Product::find($id);
        return view('products.show', compact('product', 'title'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::find($id);
        $users = User::all();
        $categories = Category::all(); 
        $title = $this->title;

        return view('products.edit', compact('product', 'users', 'categories'));
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


        $product = Product::findOrFail($id);

        if ($product) {
            if($request->hasFile('picture')) {
                $fileNameWithExt = $request->file('picture')->getClientOriginalName(); // Dit zet de exacte file naam in een var
            // Get just filename
                $filename = pathinfo($fileNameWithExt, PATHINFO_FILENAME); // Standaard php geen Laravel
            // Get just extension
                $extension = $request->file('picture')->getClientOriginalExtension();
            // Filename to store, alles samengevoegd in 1 var
                $fileNameToStore = $filename . '_' . time() . '.' . $extension;
            // Upload the image
                $path = $request->file('picture')->storeAs('images/', $fileNameToStore); // Save in /storage/app/public/images
            } else {
                $fileNameToStore = 'noimage.jpg';
            }



            $product->name = $request->input('name');
            $product->description = $request->input('description');
            //$product->picture = $request->input('picture');
            $product->picture = "/storage/images/". $fileNameToStore; // href in view is /public/storage/images , which points to /storage/app/public/images
            $product->start_of_bid_period = $request->input('start_of_bid_period');
            $product->end_of_bid_period = $request->input('end_of_bid_period');
            $product->user_id = $request->input('user_id');
            $product->category_id = $request->input('category_id');
        }

        $product->save();

        compact('product');
        $request->session()->flash('alert-danger', 'Product was successful updated!');
        return redirect('/products');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, Request $request)
    {
        $product = Product::find($id);
        if($product) {
            $product->delete();
        }
        $request->session()->flash('alert-danger', 'Product was successful deleted!');
        return redirect('/products');
    }
}
