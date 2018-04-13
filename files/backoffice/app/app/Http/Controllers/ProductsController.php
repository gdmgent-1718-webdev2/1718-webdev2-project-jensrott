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
        $products = DB::table('products')->orderBy('id', 'desc')->get();
        $usersIds = DB::select('select id from users where id = id'); // Query nog aanpassen

        //var_dump($usersIds);
        var_dump($usersIds);
        //$users = Product::find($usersIds)->user;
        return view('products.index', compact('title', 'products', 'usersIds'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $users = User::all();
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
            'name' => 'required|string|max:50',
            'description' => 'required|string|max:50',
            'picture' => 'required|string|max:50',
            'offered_by' => 'string|max:20',
            'start_of_bid_period' => 'required|date',
            'end_of_bid_period' => 'required|date',
        ]);

        $product = Product::create($request->all());
        //$product->save();
        compact('product');
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
        return view('products.edit', compact('product'));
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
            $product->name = $request->input('name');
            $product->description = $request->input('description');
            $product->picture = $request->input('picture');
            $product->start_of_bid_period = $request->input('start_of_bid_period');
            $product->end_of_bid_period = $request->input('end_of_bid_period');
            $product->offered_by = $request->input('offered_by');
        }

        $product->save();

        compact('product');
        return redirect('/products');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::find($id);
        if($product) {
            $product->delete();
        }

        return redirect('/products');
    }
}
