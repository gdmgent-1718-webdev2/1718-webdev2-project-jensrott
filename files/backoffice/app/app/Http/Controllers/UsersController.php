<?php

namespace App\Http\Controllers;

use DateTime;
use Illuminate\Http\Request;
use App\User;
use App\Product;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

//use App\Exceptions\Handler;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    protected $title = 'Users';

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
       // $users = User::select('user_name', 'email', 'id', 'deleted_at')->withTrashed(); // Vind het niet
        $users = DB::table('users')->whereNull('deleted_at')->orderBy('id', 'asc')->get();
        //$trashed_users = User::onlyTrashed()->get();
        $title = $this->title;
        return view('users.index', compact('title'  , 'users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = $this->title;
        return view('users.create', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Short way
        //User::create($request->all());


        $this->validate($request, [
            'user_name' => 'required|string|max:20|unique:users',
            'first_name' => 'required|string|regex:/^([^0-9]*)$/|max:50',
            'last_name' => 'required|string|regex:/^([^0-9]*)$/|max:50',
            'email' => 'required|string|email|max:60',
            'password' => 'required|string|min:6|confirmed',

           // 'cover_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',

            
            'address_street' => 'required|string|max:95',
            'address_number' => 'required|integer|max:999',
            'address_postcode' => 'required|integer|max:9999',
            'address_location' => 'required|string|max:95',
            'address_country' => 'required|string|max:95'
            
        ]);

        /*
        if ($request->hasFile('cover_image')) {
            $image = $request->file('cover_image');
            $name = time().'.'.$image->getClientOriginalExtension(); // Welke naam we het gaan opslaan
            $destinationPath = $image->storeAs('public/images', $name);
            $image->move($destinationPath, $name);
        }
        */
        /*
        if($request->hasFile('cover_image')) {
            $fileNameWithExt = $request->file('cover_image')->getClientOriginalName(); // Dit zet de exacte file naam in een var

            // Get just filename
            $filename = pathinfo($fileNameWithExt, PATHINFO_FILENAME); // Standaard php geen Laravel

            // Get just extension
            $extension = $request->file('cover_image')->getClientOriginalExtension();

            // Filename to store, alles samengevoegd in 1 var
            $fileNameToStore = $filename . '_' . time() . '.' . $extension;

            // Upload the image
            $path = $request->file('cover_image')->storeAs('public/cover_images', $fileNameToStore); // Saven in de image
        } else {
            $fileNameToStore = 'noimage.jpg';
        }
        */


       $user = User::create([
            'user_name' => $request->input('user_name'),
            'first_name' => $request->input('first_name'),
            'last_name' => $request->input('last_name'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),

           // 'cover_image' => $fileNameToStore,

            
            'address_street' => $request->input('address_street'),
            'address_number' => $request->input('address_number'),
            'address_postcode' => $request->input('address_postcode'),
            'address_location' => $request->input('address_location'),
            'address_country' => $request->input('address_country'),
            

            //'status' => 'Active',
        ]);

    

        compact('user');
        $request->session()->flash('alert-dark', 'User was successful added!');
        return redirect('/users');


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

        $user = User::withTrashed()
                    ->find($id);
                 // search needs to include the list of softdeleted models
        
         //$user = User::find($id); //Original statement (did not include the softdeleted records)
        return view('users.show', compact('user', 'title'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        return view('users.edit', compact('user'));
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
        

        $user = User::find($id);
        
        
        $rules = [
            'user_name' => 'required|string|max:20|unique:users',
            'first_name' => 'required|string|regex:/^([^0-9]*)$/|max:50',
            'last_name' => 'required|string|regex:/^([^0-9]*)$/|max:50',
            'email' => 'required|string|email|max:60',
            'address_number' => 'required|integer|max:16',
            'password' => 'required|string|min:6|confirmed',
        ];



        $data = [
            'user_name' => $user->user_name = $request->input('user_name'),
            'first_name' => $user->first_name = $request->input('first_name'),
            'last_name' => $user->last_name = $request->input('last_name'),
            'email' => $user->email = $request->input('email'),
            'address_street' => $user->email = $request->input('address_street'),
            'address_number' => $user->email = $request->input('address_number'),
            'address_postcode' => $user->email = $request->input('address_postcode'),
            'address_location' => $user->email = $request->input('address_location'),
            'address_country' => $user->email = $request->input('address_country'),



        ];
        $validator =  Validator::make($request->all(), $rules);

        $user->update($data, $rules);
        //$user->update($data);

        compact('user');
        $request->session()->flash('alert-dark', 'User was successful updated!');
        return redirect('/users');
    }

    
        
        /**
         * Remove the specified resource from storage (hard and soft versions)
         *
         * @param  int  $id
         * @return \Illuminate\Http\Response
         *
         */
        
        public function hardDelete($id, Request $request)  {

        $user = User::withTrashed()
            ->find($id);
        // search needs to include the list of softdeleted models
        //$user = User::withTrashed()->where($id)->get();      
        // $user = User::find($id);
    
        if ($user) {
            $UserName = $user->user_name;
                        
            $products = Product::withTrashed()->where('user_id',$id)->get();
            foreach ($products as $product) {   
                $product->forceDelete();              // Related products are also deleted to guarantee integrity of the database
            }
            $user->forceDelete(); // Hard delete forever
            $request->session()->flash('alert-danger', $UserName. ' was successfully hard deleted!');
        } else {
            $request->session()->flash('alert-danger', 'Something went wrong!');
        }
       
        return redirect('/users');
        }


        public function softDelete($id, Request $request) {
            
           // $user = User::withTrashed()->where($id)->get();
               
            $user = User::find($id);
    

        if ($user) {
            $UserName = User::find($id)->user_name;
            $products = User::find($id)->products;        // Use the one2many relation between user and products
            foreach ($products as $product) {
                  
                $product->delete();              // Related products are also deleted to guarantee integrity of the database
            }
            $user->delete(); // Soft delete
            $request->session()->flash('alert-danger', $UserName. ' and related products were successfully soft deleted!');
        } else {
            $request->session()->flash('alert-danger', 'Something went wrong!');
        }
        return redirect('/users');
        }

    // Show soft deleted users
        public function showTrash() {
            $title = 'Users';
            //$users = DB::table('users')->whereNotNull('deleted_at')->orderBy('id', 'asc')->get();
            $users = User::onlyTrashed()->get();
            // $trashedUsers = User::onlyTrashed()->get();
        return view('users.trash', compact('users', 'title'));
    }


        // Restore a user and related products
        public function restore($id, Request $request) {

            $user = User::onlyTrashed()->findOrFail($id);
            $products = Product::onlyTrashed()->where('user_id',$id)->get();
            foreach ($products as $product) {   
                $product->restore();              // Related products are also restored to guarantee integrity of the database
            }
            $user->restore();
               // compact('user');
            $request->session()->flash('alert-danger', 'User and related products were successfully restored!');
            return redirect('/users');

                // Adding message the record is successfully restored

        }
}
