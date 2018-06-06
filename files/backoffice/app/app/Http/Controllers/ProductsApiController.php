<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Http\Resources\Product as ProductResource;

class ProductsApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();
        return ProductResource::collection($products);
    }

    /**
     * Show the form for creating a new resource // Not implemented for API route
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
        $product = Product::create([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'picture' => $request->input('picture'),
           // 'picture' => "/storage/images/". $fileNameToStore, // href in view is /public/storage/images , which points to /storage/app/public/images
            'start_of_bid_period' => $request->input('start_of_bid_period'),
            'end_of_bid_period' => $request->input('end_of_bid_period'),
            'user_id' => $request->input('user_id'),
            'category_id' => $request->input('category_id'),
        ]);
        
        // Only creating new product is implemented ... Updating of a product will be handled later.
        
        //$product = $request->isMethod('put') ? // We checken is het een PUT request? Dan updaten we gegevens
            // zoniet maken we een nieuwe aan dus een POST request.
          //  Product::findOrFail($request->product_id) : new Product();

        //$product->id = $request->input('id');
        //$product->name = $request->input('name');
        //$product->description = $request->input('description');
        //$product->picture = $request->input('picture');
        //$product->start_of_bid_period = $request->input('start_of_bid_period');
        //$product->end_of_bid_period = $request->input('end_of_bid_period');

        //$product->user_id = $request->input('user_id');
        //$product->category_id = $request->input('category_id');

        //if($product->save()) {
        return new ProductResource($product); // returns a new Product resource to the client 
        //}
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::find($id);
        return new ProductResource($product);
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
        $product = Product::findOrFail($id);

        if($product->delete()) {
            return new ProductResource($product); // Softdelete , so not fully removed from database
        }
    }
}
