@extends('admin.main')

@section('noidung')

<p>
	{{$product->id}}
</p>
<p>
	{{$product->productName}}
</p>
<p>
	{{$product->slug}}
</p>
<p>
	{{$product->catId}}
</p>
<p>
	{{$product->brandId}}
</p>
<p>
	{{$product->detail}}
</p>
<p>
	{{$product->status}}
</p>
<p>
	<?php if($product->status==0) echo "Ẩn"; else echo "Hiện"; ?>
</p>

@endsection('noidung')