<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $title = 'Categories';

    public function index()
    {
        $title = $this->title;
        $categories = DB::table('categories')->orderBy('id', 'desc')->get();
        return view('categories.index', compact('categories', 'title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = $this->title;
        return view('categories.create', compact('title'));
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
            //'picture' => 'required|string|max:50',
            //'picture' => 'required|mimes:jpg|max:8000',
        ]);

/*
        if ($request->hasFile('picture')) {
            $image = $request->file('picture');
            $name = time().'.'.$image->getClientOriginalExtension(); // Welke naam we het gaan opslaan ?full path ?
            $destinationPath = $image->storeAs('public/category_images', $name);
            $image->move($destinationPath, $name);
        }
        */
        
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
        


       
        $category = Category::create([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'picture' => "/storage/images/". $fileNameToStore, // href in view is /public/storage/images , which points to /storage/app/public/images

            
            
            

            
        ]);
        







        //$category = Category::create($request->all());
        //$product->save();
        compact('category');
        $request->session()->flash('alert-dark', 'Category was successful added!');
        return redirect('/categories');
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
        $category = Category::find($id);
        return view('categories.show', compact('category', 'title'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Category::find($id);
        return view('categories.edit', compact('category'));
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
        

        $this->validate($request, [
            'name' => 'required|string|max:50',
            'description' => 'required|string|max:50',
            //'picture' => 'required|string|max:50'
        ]);

        $category = Category::findOrFail($id);
        

        if ($category) {
            
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
        
       
            
                $category->name = $request->input('name');
                $category->description = $request->input('description');
                $category->picture = "/storage/images/". $fileNameToStore; // href in view is /public/storage/images , which points to /storage/app/public/images
            
        }

         $category->save();

        compact('category');
        $request->session()->flash('alert-dark', 'Category was successful updated!');
        return redirect('/categories');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, Request $request)
    {
        $category = Category::find($id);
        if($category) {
            $categoryName = $category->name;
            $products = Category::find($id)->products;        // Use the one2many relation between category and products
            foreach ($products as $product) {
                  
                $product->delete();              // Related products are also deleted to guarantee integrity of the database
            }
            $category->delete(); // Hard Delete ; No SoftDelete enabled on categories ...
            $request->session()->flash('alert-danger', ' Category ' . $categoryName . ' was successfully hard deleted!');
        } else { 
            $request->session()->flash('alert-danger', 'Something went wrong!');
        }
        return redirect('/categories');
    }
}

// Should also delete related products ?? and bids ?? 
