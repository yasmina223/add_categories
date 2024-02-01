<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{

    public function __construct()
{
    $this->middleware('auth');

}
    public function index()
    {
        $brands=Brand::latest()->paginate(3);
        return view('admin.brand.index',compact('brands'));
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
    'brand_name'=>'required|unique:brands',
    'brand_image'=>'required|image|mimes:jpg,jpeg,png|max:5048'
],
[
    'brand_name.required'=>'please enter brand name',
    'brand_image.required'=>'please select brand image',
    'brand_image.image'=>'please select valid image',


]);
$image=$request->file('brand_image');
$name_gen=hexdec(uniqid());
$image_ext=strtolower($image->getClientOriginalExtension());
$image_name=$name_gen.'.'.$image_ext;
$path='image/brand/';
$image_url=$path.$image_name;
$image->move($path,$image_name);
Brand::create([
    'brand_name'=>$request->brand_name,
    'brand_image'=>$image_url
]);
return redirect()->back()->with('success' ,'Brand Inserted SuccessFull');





    }

    /**
     * Display the specified resource.
     */
    public function show(Brand $brand)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $brands=Brand::find($id);
        return view('admin.brand.edit',compact('brands'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
 $brands=Brand::find($id);
 $image=$request->file('brand_image');
$name_gen=hexdec(uniqid());
$image_ext=strtolower($image->getClientOriginalExtension());
$image_name=$name_gen.'.'.$image_ext;
$path='image/brand/';
$image_url=$path.$image_name;
$image->move($path,$image_name);
$brands->update([
    'brand_name'=>$request->brand_name,
    'brand_image'=>$image_url
]);
return redirect()->route('Brands')->with('success' ,'Brand Updated SuccessFully');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $brand=Brand::find($id);
        $brand->delete();
        return redirect()->back()->with('success' ,'Brand Deleted SuccessFully');
    }
}
