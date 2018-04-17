<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

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
        //$users = User::all();
        $users = DB::table('users')->orderBy('id', 'desc')->get();
        $title = $this->title;
        return view('users.index', compact('title', 'users'));
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


    public function softDelete($id) {

        $user = User::withTrashed()->where($id, 1)->get();

        if($user->trashed()) {
            echo 'soft deleted';
        }
    }

    public function softUnDelete($id) {
        $user = User::withTrashed()->where($id, 1)->get();
        $user->restore();
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
            $user->delete();
        }

        return redirect('/users');

    }

}
