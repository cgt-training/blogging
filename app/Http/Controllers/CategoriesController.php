<?php

namespace App\Http\Controllers;
use Validator;
use Session;
use Illuminate\Http\Request;
use App\Category;
class CategoriesController extends Controller
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
        $category = new Category;
        $id = $request->id;
        if($id != null)
          $category = Category::findOrFail($id);
        $categories=Category::all();
        return view('categories.index')->with(['categories'=>$categories,'cat'=>$category]);
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
            'name' => 'required|unique:categories|max:50',   
        ]);

        if ($validator->fails()) {
            return redirect()->route('categories.index')
                        ->withErrors($validator)
                        ->withInput();
        }

        $category=new Category;
        $category->name=$request->name;
        $category->save();
        return redirect()->route('categories.index');
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
            return redirect()->route('categories.index')
                        ->withErrors($validator)
                        ->withInput();
        }
        $category = Category::findOrFail($id);
        $category->name=$request->name;
         $category->save();
         return redirect()->route('categories.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        try
        {
           $category->delete();
        }
        catch ( \Illuminate\Database\QueryException $e) {
            Session::flash('message', 'Posts available for this category, Cannot be deleted.'); 
        }
        return redirect()->route('categories.index');
    }
}
