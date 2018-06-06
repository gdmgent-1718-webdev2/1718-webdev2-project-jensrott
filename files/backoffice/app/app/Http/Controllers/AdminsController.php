<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Admin;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AdminsController extends Controller

{

    protected $title = 'Admins';

    public function index() {
        $title = $this->title;
        $admins = DB::table('admins')->orderBy('id', 'desc')->get();
        return view('admins.index', compact('title', 'admins'));
    }

    public function create()
    {
        $title = $this->title;
        return view('admins.create', compact('title'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'user_name' => 'string|max:20|unique:users',
            'first_name' => 'required|string|max:50',
            'last_name' => 'required|string|max:50',
            'email' => 'required|string|email|max:60|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'role' => 'required|string|max:10',
        ]);

        $admin = Admin::create([
            'user_name' => $request->input('user_name'),
            'first_name' => $request->input('first_name'),
            'last_name' => $request->input('last_name'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
            'role' => $request->input('role'),
        ]);
        compact('admin');
        $request->session()->flash('alert-dark', 'Admin was successful added!');
        return redirect('/admins');
    }

    public function show($id) {
        $title = $this->title;
        $admin = Admin::find($id);
        return view('admins.show', compact('admin', 'title'));
    }

    public function edit($id)
    {
        $admin = Admin::find($id);
        return view('admins.edit', compact('admin'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'user_name' => 'string|max:20|unique:users',
            'first_name' => 'required|string|max:50',
            'last_name' => 'required|string|max:50',
            'email' => 'required|string|email|max:60|unique:users',
            //'password' => 'required|string|min:6|confirmed', // Not enabled in edit form
            'role' => 'required|string|max:11',
        ]);

        $admin = Admin::find($id);


        $admin->user_name = $request->input('user_name');
        $admin->first_name = $request->input('first_name');
        $admin->last_name = $request->input('last_name');
        $admin->email = $request->input('email');
        $admin->role = $request->input('role');

        $admin->save();

        compact('admin');
        $request->session()->flash('alert-dark', 'Admin was successful updated!');
        return redirect('/admins');
    }

    public function destroy($id, Request $request)
    {
        $admin = Admin::find($id);
        if($admin) {
            $admin->delete();
        }
        $request->session()->flash('alert-danger', 'Admin was successful deleted!');
        return redirect('/admins');
    }
}
