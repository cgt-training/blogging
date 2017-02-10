<?php

namespace App\Http\Controllers;
use Validator;
use Session;
use Illuminate\Http\Request;
use App\Tag;
class TagsController extends Controller
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
    public function index(Request $request)
    {
        $tg = new Tag;
        $id = $request->id;
        if($id != null)
          $tg = Tag::findOrFail($id);
        $tags=Tag::all();
        return view('tags.index')->with(['tags'=>$tags,'tg'=>$tg]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            'name' => 'required|unique:tags|max:50',   
        ]);

        if ($validator->fails()) {
            return redirect()->route('tags.index')
                        ->withErrors($validator)
                        ->withInput();
        }

        $tag=new Tag;
        $tag->name=$request->name;
        $tag->save();
        return redirect()->route('tags.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
            'name' => 'required|unique:categories|max:50',   
        ]);

        if ($validator->fails()) {
            return redirect()->route('tags.index')
                        ->withErrors($validator)
                        ->withInput();
        }
        $tag = Tag::findOrFail($id);
        $tag->name=$request->name;
         $tag->save();
         return redirect()->route('tags.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tag $tag)
    {
        try
        {
           $tag->delete();
        }
        catch ( \Illuminate\Database\QueryException $e) {
            Session::flash('message', 'Posts available for this tag, Cannot be deleted.'); 
        }
        return redirect()->route('tags.index');
    }
}
