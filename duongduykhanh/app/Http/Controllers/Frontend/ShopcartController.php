<?php

namespace App\Http\Controllers\frontend;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use DB;

class ShopcartController extends Controller
{
    public function cart()
    {
        if(Cart::count()<=0)
        return view('frontend.shopcart.cart_empty');
        else return view('frontend.shopcart.cart');
    }
        public function cart_Add($slug)
    {
        $product=Product::where('slug',$slug)->first();
        Cart::add(['id'=>$product->id,
        'name'=>$product->productName,
        'price'=>$product->price,
        'qty'=>1,
        'weight'=>0,
        'options'=>['image'=>$product->image]
    ]);
        return redirect()->back();
    }

    public function cart_Delete($row_id)
    {
        Cart::remove($row_id);
        return view('frontend.shopcart.cart');
    }
    public function cart_dec($row_id)
    {
        $row=Cart::get($row_id);
        if($row->qty > 1){
            Cart::update($row_id, $row->qty - 1);
        }
        return view('frontend.shopcart.cart');
    }
    public function cart_inc($row_id)
    {
        $row=Cart::get($row_id);
        if($row->qty < 10){
            Cart::update($row_id, $row->qty + 1);
        }
        return view('frontend.shopcart.cart');
    }
    public function cart_DeleteAll()
    {
        Cart::destroy();
        return view('frontend.shopcart.cart');
    }
    public function checkout()
    {
        if(Auth::guard('customer')->check()){
            $customer=Auth::guard('customer')->user();
            return view('frontend.shopcart.checkout',['customer'=>$customer]);
        }
        else
            return redirect('/login')->with('success','Pleass login for checkout');
    }
    public function doCheckOut(Request $request)
    {
        //cap nhat thong tin khach hang
        $id=$request->id;
        $customerName=$request->customerName;
        $address=$request->address;
        $phone=$request->phone;
        $email=$request->email;
        DB::update('update duongduykhanhcustomers set customerName=?, address=?,  phone=?, email=? where id=?',[$customerName, $address, $phone, $email, $id]);
    
        //cap nhat thong tin don hang
        $customerId=$id;
        $total=Cart::total();
        $status=1;
        $note=$request->note;
        DB::insert('insert into duongduykhanhorders(customerId,total,status,note) value(?,?,?,?)',[$customerId,$total,$status,$note]);
        //cap nhat thong tin chi tiet
        $orderId=DB::select('select id from duongduykhanhorders order by created_at desc')[0]->id;
        foreach(Cart::content()as $row)
        {
            $productId=$row->id;
            $price=$row->price;
            $quantity=$row->qty;
            DB::insert('insert into duongduykhanhorders(customerId,total,status,note) value(?,?,?,?)',[$orderId,$productId,$price,$quantity]);
        }
        //xoa noi dung Cart
        Cart::destroy();
        return view('frontend.shopcart.ordersuccess');
    }



}

