<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Brand;

class BrandController extends Controller
{

    public function index()
    {
        $brand=Brand::latest()->paginate(5);
        return view('/admin/brand/index',['brands'=>$brand, 'title'=>'Brand LIST']);
    }


    public function create()
    {
        
        return view('admin/Brand/create',['title'=>'Brand Create']);
    }


    public function store(Request $request)
    {
        $validated =$request->validate(['brandName'=>'required|max:30|unique:duongduykhanhbrands,brandName','slug'=>'required|unique:duongduykhanhbrands,slug',]);
        $dataInsert=$request->input();

        Brand::create($dataInsert);
        return redirect()->back()->with('success','Create Brand successfully');
    }


    public function show(Brand $brand)
    {
        return view('admin.brand.show',['brand'=>$brand,'title'=>'Brand Information']);
    }


    public function edit(Brand $brand)
    {
        
        return view('admin.brand.edit',['brand'=>$brand,'title'=>'Brand edit']);
    }


    public function update(Request $request, Brand $brand)
    {
        $validated =$request->validate(['brandName'=>'required|max:30|unique:duongduykhanhbrands,brandName','slug'=>'required|unique:duongduykhanhbrands,slug',]);
        $brand->update($request->all());

        return redirect("admin/brand")->with('success','update thanh cong');
    }
    public function trash($id)
    {
        Brand::where('id',$id)->delete();
        return redirect('/admin/brand')->with('success','dalete successfully');
    }
    public function intrash()
    {
        $brand=Brand::onlyTrashed()->paginate(5);
        return view('/admin/brand/intrash',['brands'=>$brand, 'title'=>'Brand LIST IN TRASH']);
    }
    public function restore($id)
    {
        Brand::onlyTrashed()->where('id',$id)->restore();
        return redirect('/admin/brand')->with('success','Restore successfully');
    }


    public function destroy($id)
    {
        Brand::onlyTrashed()->where('id',$id)->forceDalete();
        return redirect('/admin/brand-intrash')->with('success','Destroy successfully');
    }

}
