@extends('admin.main')

@section('noidung')

<p>
	ID: {{$order->id}}
</p>
<p>
	Customer name:{{$order->customer->customerName}}
</p>
<p>
	Total: {{$order->total}}
</p>
<h3>Products</h3>
<hr>
@foreach($order->products as $product)
	<p>{{ $product->product->productName }}</p>
@endforeach

@endsection('noidung')