<?php

namespace App\Http\Controllers;
use Validator;
use Illuminate\Http\Request;
use App\Post;
use App\Tag;
use App\Category;
class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $posts=Post::paginate(10);
        return view('post.index')->withPosts($posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         $categories=Category::all();
         $tags = Tag::all();
        return view('post.create')->with(['categories'=>$categories,
            'tags'=>$tags]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

         $validator = Validator::make($request->all(), [
            'title' => 'required|unique:posts|max:255',
            'slug' => 'required|unique:posts|max:255',
            'category_id'=>'required',
            'body' => 'required',
        ]);
        if ($validator->fails()) {
            return redirect()->route('posts.create')
                        ->withErrors($validator)
                        ->withInput();
        }
        $post = new Post;
        $post->title = $request->title;
        $post->body = $request->body;
        $post->slug = $request->slug;
        $post->category_id = $request->category_id;
        $post->save();
        $post->tags()->sync($request->tags);
        return redirect()->route('posts.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('post.show')->withPost($post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $categories=Category::all();
         $tags = Tag::pluck('name','id');
         
        return view('post.edit')->with(['post'=>$post,'categories'=>$categories,'tags'=>$tags]);
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
          $validator = Validator::make($request->all(), [
            'title' => 'required|max:255|unique:posts,title,'.$id.'',
            'slug' => 'required|max:255|unique:posts,slug,'.$id.'',
            'body' => 'required',
        ]);
        if ($validator->fails()) {
            return redirect()->route('posts.edit',[$id])
                        ->withErrors($validator)
                        ->withInput();
        }  

        $post = Post::findOrFail($id);
        $post->title = $request->title;
        $post->body = $request->body;
        $post->slug = $request->slug;
        $post->category_id = $request->category_id;
        $post->save();
        $post->tags()->toggle($request->tags);
         return redirect()->route('posts.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('posts.index');
    }
}
