<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class DeleteController extends Controller
{
    /* Class with logic for all deleting */
    public function softDelete($id) {
        User::find($id)->delete();
        //return redirect('/users');
        return view('users.show');
    }

    public function hardDelete($id) {

        $user = User::withTrashed()->where($id)->get()->forceDelete();

        if ($user) {
            $user->forceDelete(); // Hard delete forever
        }

        //$user = User::find($id)->withTrashed()->history()->forceDelete();
        compact('user');
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

    // Restore a user
    public function restore($id) {

        User::onlyTrashed()->find($id)->restore();

        // compact('user');
        return redirect('/users');

        // Message erbij van succesful
    }
}
