<?php

namespace App\Http\Controllers;

use App\Providers\RouteServiceProvider;

class AdminController extends Controller
{
    protected $redirectTo = RouteServiceProvider::HOME;

    public function __construct()
    {
        $this->middleware(['auth', 'admin.panel']);
    }

    public function AdminIndex()
    {
        return view('pages.admin.pages.dashboard');
    }

    public function AdminPosts(){
        return view('pages.admin.pages.posts.index');
    }
}
