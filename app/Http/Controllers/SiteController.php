<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
class SiteController extends Controller
{
    public function index()
    {
        $posts=Post::get();
    	return view("home")->withPosts($posts);
    }
    public function about()
    {
    	return view("site.about");
    }
    public function contact()
    {
    	return view("site.contact");
    }
    public function postContact(Request $request)
    {
    	return "contact posted";
    }
}
