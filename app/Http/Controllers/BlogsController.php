<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Illuminate\Support\Facades\DB;

class BlogsController extends Controller
{
    public function index()
    {
    	$posts=Post::paginate(10);
    	return view('blogs.index')->withPosts($posts);
    }
    public function view($slug='')
    {
    	
    	$post=Post::where('slug',$slug)->first();
    	return view('blogs.view')->withPost($post);
    }
}
