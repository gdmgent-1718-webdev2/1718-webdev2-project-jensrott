<?php

namespace App\Http\Controllers;

use App\Category;
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
            'picture' => 'required|string|max:50',
        ]);

        $category = Category::create($request->all());
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
        $category = Category::findOrFail($id);

        if ($category) {
            $category->name = $request->input('name');
            $category->description = $request->input('description');
            $category->picture = $request->input('picture');
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
            $category->delete();
        }
        $request->session()->flash('alert-danger', 'Category was successful deleted!');
        return redirect('/categories');
    }
}
