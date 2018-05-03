<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Admin;

class PagesController extends Controller
{
    protected $title = 'Page';

    public function index() {
        $this->title = 'hello!';
        return view('index', compact('title'));
    }

    // Eventueel later een aparte controller als mijn profiel uitgebreid word
    public function profile() {
        $this->title = 'Profile';
        $firstSuperAdmin = Admin::all()->firstWhere('role', '=', 'Admin'); // Cool! ;p
        return view('admins.profile', compact('title', 'firstSuperAdmin'));
    }
}
