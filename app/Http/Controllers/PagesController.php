<?php

namespace App\Http\Controllers;

use App\Providers\RouteServiceProvider;

class PagesController extends Controller
{
    protected $redirectTo = RouteServiceProvider::HOME;

    public function HomeController()
    {
        return view('pages.home');
    }

    public function ContactController(){
        return view('pages.contact');
    }

    public function AboutController(){
        return view('pages.about');
    }

    public function ForumController(){
        return view('pages.forum');
    }

    public function DonateController(){
        return view('pages.donate');
    }
}
