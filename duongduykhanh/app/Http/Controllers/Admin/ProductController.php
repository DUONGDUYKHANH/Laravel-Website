<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Brand;

class ProductController extends Controller
{

    public function index()
    {
        $products=Product::latest()->paginate(5);
        foreach($products as $product)
        {
            $product->catName=Category::where('id',$product->catId)->first()->catName;
            $product->brandName=Brand::where('id',$product->brandId)->first()->brandName;
        }
        return view('/admin/product/index',['products'=>$products, 'title'=>'Product LIST']);
    }


    public function create()
    {
        $categories1=Category::where('parentId',0)->get();
        $categories2=Category::where('parentId',">",0)->get();
        $brands=Brand::all();
        return view('admin/product/create',['title'=>'Product Create','categories1'=>$categories1,'categories2'=>$categories2,'brands'=>$brands]);
    }


    public function store(Request $request)
    {
        $validated =$request->validate(['productName'=>'required|max:100|unique:duongduykhanhproducts,productName','slug'=>'required|unique:duongduykhanhproducts,slug',]);
        $dataInsert=$request->input();

        Product::create($dataInsert);
        return redirect()->back()->with('success','Create Product successfully');
    }


    public function show(Product $product)
    {
        return view('admin.product.show',['product'=>$product,'title'=>'Product Information']);
    }


    public function edit(Product $product)
    {
        $categories1=Category::where('parentId',0)->get();
        $categories2=Category::where('parentId',">",0)->get();
        $brands=Brand::all();
        return view('admin.product.edit',['product'=>$product,'title'=>'Product edit','categories1'=>$categories1,'categories2'=>$categories2,'brands'=>$brands]);
    }


    public function update(Request $request, Product $product)
    {
        $validated =$request->validate(['productName'=>'required|max:100|unique:duongduykhanhproducts,productName','slug'=>'required|unique:duongduykhanhproducts,slug',]);
        $product->update($request->all());

        return redirect("admin/product")->with('success','update thanh cong');
    }
    public function trash($id)
    {
        Product::where('id',$id)->delete();
        return redirect('/admin/product')->with('success','dalete successfully');
    }
    public function intrash()
    {
        $products=Product::onlyTrashed()->paginate(5);
        return view('/admin/product/intrash',['products'=>$products, 'title'=>'Product LIST IN TRASH']);
    }
    public function restore($id)
    {
        Product::onlyTrashed()->where('id',$id)->restore();
        return redirect('/admin/product')->with('success','Restore successfully');
    }


    public function destroy($id)
    {
        Product::onlyTrashed()->where('id',$id)->forceDalete();
        return redirect('/admin/product-intrash')->with('success','Destroy successfully');
    }
    public function toggleStatus($id)
    {
        $product=Product::find($id);  
        if($product->status==0)$product->status=1;
        else $product->status=0;
        $product->save();
        return redirect('/admin/Product')->with('success','Toggle Status successfully');
    }
}
