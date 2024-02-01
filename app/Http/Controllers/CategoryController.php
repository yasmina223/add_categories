<?php

namespace App\Http\Controllers;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */

public function __construct()
{
    $this->middleware('auth');

}


    public function index()
    {
      $categories=Category::latest()->get();
      $categories=Category::latest()->paginate(3);
      return view('admin.categories.index',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate=$request->validate([
          'category_name'=>'required|unique:categories|max:10',
        ],
        [
          'category_name.required'=>'Please enter category name',
          'category_name.unique'=>'Category name already exist',
          'category_name.max'=>'Category name is too long',
        ]

        );
      Category::create([
        'category_name'=>$request->category_name,
        'user_id'=>auth()->user()->id,
      ]);
      return redirect()->back()->with('success','Category Created Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
       $categories=Category::find($id);
       return view('admin.categories.edit',compact('categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,  $id)
    {
        $categories=Category::find($id);
        $categories->update([
           'category_name'=>$request->category_name,
           'user_id'=>auth()->user()->id,
        ]);
        return redirect()->route('category')->with('success','Category Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( Category $category,$id)
    {
        $category=Category::find($id);
        $category->destroy($id);
        return redirect()->route('category')->with('success','Category Deleted Successfully');
    }
    public function trashedcategory(Category $category)
    {
        $trashedcategory=Category::onlyTrashed()->paginate(3);
        return view('admin.categories.deletedcategories',compact('trashedcategory'));
    }//get data in the blade
    public function restore($id)
    {
        $trashedcategory=Category::withTrashed()->find($id);
        $trashedcategory->restore();
        return redirect()->back()->with('success','Category Restored Successfully');
    }//RestoredCategory
    public function harddelete($id)
    {
        $trashedcategory=Category::withTrashed()->find($id);
        $trashedcategory->forceDelete();
        return redirect()->back()->with('success','Category Deleted Successfully');
    }//forceDelete


}
