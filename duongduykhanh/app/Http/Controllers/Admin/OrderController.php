<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Product;
use App\Models\Category;

class OrderController extends Controller
{

    public function index()
    {
        $orders = Order::paginate(5);
        $title = "Orders";
        return view('admin.orders.index', compact('orders', 'title'));
    }

    public function show($id)
    {
        $order = Order::findOrFail($id);
        $title = "Orders";
        return view('admin.orders.show', compact('order', 'title'));
    }

    public function edit($id)
    {
        $order = Order::findOrFail($id);
        $title = "Orders";
        return view('admin.orders.edit', compact('order', 'title'));
    }

    public function update(Request $request, Orders $orders)
    {

        $validated =$request->validate(['title'=>'required|max:100|unique:duongduykhanhorders,customerId','slug'=>'required|unique:duongduykhanhorders,slug',]);
        $orders->update($request->all());

        return redirect("admin/orders")->with('success','update thanh cong');
    }
    public function trash($id)
    {
        Orders::where('id',$id)->delete();
        return redirect('/admin/orders')->with('success','dalete successfully');
    }
        public function intrash()
    {
        $orders=Orders::onlyTrashed()->paginate(5);
        return view('/admin/orders/intrash',['orders'=>$orders, 'title'=>'Link LIST IN TRASH']);
    }
    public function restore($id)
    {
        Orders::onlyTrashed()->where('id',$id)->restore();
        return redirect('/admin/orders')->with('success','Restore successfully');
    }

}
