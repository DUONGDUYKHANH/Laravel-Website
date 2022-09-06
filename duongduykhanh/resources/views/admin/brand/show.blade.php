@extends('admin.main')

@section('noidung')

<p>
	{{$brand->id}}
</p>
<p>
	{{$brand->brandName}}
</p>
<p>
	{{$brand->slug}}
</p>
<p>
	{{$brand->description}}
</p>
<p>
	{{$brand->status}}
</p>
<p>
	@if($brand->status==0)
    <a href='#' class='btn btn-secondary'>Ẩn</a>
    @elseif($brand->status==1)
    <a href='#' class='btn btn-primary'>Hiện</a>
    @elseif($brand->status==2)
    <a href='#' class='btn btn-primary'>Trang chủ</a>
    @endif
</p>

@endsection('noidung')