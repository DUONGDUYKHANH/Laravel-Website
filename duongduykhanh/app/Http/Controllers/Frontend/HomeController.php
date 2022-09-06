<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use App\Models\Brand;

class HomeController extends Controller
{
    public function index()
    {
        $categories=Category::where('status',2)->get();
        return view('frontend.home.index',['categories'=>$categories]);
    }
    public function allProductByCat($slug='')
    {
        $cat=Category::where('slug',$slug)->first();
        $products=Product::where('catId',$cat->id)->where('status','>',0)->paginate(4);
        return view('frontend.home.allproductbycat',['cat'=>$cat,'products'=>$products]);
    }
    public function allProductByBrand($slug='')
    {
        $brand=Brand::where('slug',$slug)->first();
        $products=Product::where('brandId',$brand->id)->where('status','>',0)->paginate(4);
        return view('frontend.home.allproductbybrand',['brand'=>$brand,'products'=>$products]);
    }
    public function search(Request $request)
    {
        $keywords=$request->keywords;
        $products =Product::where('productName','like',"%{$keywords}%")->get();
        return view('frontend.home.search',['products'=>$products]);
    }
    public function productDetail($slug)
    {
        $products=Product::where('slug',$slug)->where('status','>',0)->first();
        return view('frontend.home.productdetail',['products'=>$products]);
    }
}
