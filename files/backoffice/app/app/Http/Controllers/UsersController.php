<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

//use App\Exceptions\Handler;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    protected $title = 'Users';

    public function index()
    {
       // $users = User::select('user_name', 'email', 'id', 'deleted_at')->withTrashed(); // Vind het niet
        $users = DB::table('users')->whereNull('deleted_at')->orderBy('id', 'asc')->get();

        //$users = User::all('id')->withTrashed()->get();
        //$users = User::all()->withTrashed()->sortByDesc('name');
        //$trash = DB::table('users')->withTrashed()->get();
        $title = $this->title;
        return view('users.index', compact('title' ,'trashedUsers' , 'users'));
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
            'user_name' => 'string|max:20|unique:users',
            'first_name' => 'required|string|max:50',
            'last_name' => 'required|string|max:50',
            'email' => 'required|string|email|max:60|unique:users',
            'password' => 'required|string|min:6|confirmed',

            'address_street' => 'required|string|max:95',
            'address_number' => 'required|integer|max:16',
            'address_postcode' => 'required|integer',
            'address_location' => 'required|string|max:95',
            'address_country' => 'required|string|max:95'
        ]);

        $user = User::create([
            'user_name' => $request->input('user_name'),
            'first_name' => $request->input('first_name'),
            'last_name' => $request->input('last_name'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),

            'address_street' => $request->input('address_street'),
            'address_number' => $request->input('address_number'),
            'address_postcode' => $request->input('address_postcode'),
            'address_location' => $request->input('address_location'),
            'address_country' => $request->input('address_country'),

            //'status' => 'Active',
        ]);

        /*
        $user = new User;
        $user->user_name = $request->input('user_name');
        $user->first_name = $request->input('first_name');
        $user->last_name = $request->input('last_name');
        $user->email = $request->input('email');
        $user->password = $request->input('password');
        $user->save();
        */

        compact('user');
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
        $user = User::find($id);
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
        $user = User::findOrFail($id);

        if ($user) {
            $user->user_name = $request->input('user_name');
            $user->first_name = $request->input('first_name');
            $user->last_name = $request->input('last_name');
            $user->email = $request->input('email');

            $user->address_street = $request->input('address_street');
            $user->address_number = $request->input('address_number');
            $user->address_postcode = $request->input('address_postcode');
            $user->address_location = $request->input('address_location');
            $user->address_country = $request->input('address_country');
        }

        $user->save();

        compact('user');
        return redirect('/users');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        if($user) {
            $user->delete(); // SoftDelete
            // Succesful
        }

        return redirect('/users');
    }

    // Doesn't work yet
    // Because he looks for the id in users.show and that isn't there anymore for some strange reason
    // restore works
    public function delete($id)
    {

        $user = User::find($id);
        if ($user) {
            $user->forceDelete(); // Hard delete forever
        }

        //$user = User::find($id)->withTrashed()->history()->forceDelete();
        compact('user');
        return redirect('/users');
    }


    // Show soft deleted users
    public function showTrash() {
        $title = $this->title;
        //$users = DB::table('users')->whereNotNull('deleted_at')->orderBy('id', 'asc')->get();
        $users = User::onlyTrashed()->get();
       // $trashedUsers = User::onlyTrashed()->get();
        return view('users.trash', compact('users', 'title'));
    }

    // Restore a user
    public function restore($id) {

        $user = User::onlyTrashed()->find($id)->restore();

           // compact('user');
            return redirect('/users');

            // Message erbij van succesful

    }
}
