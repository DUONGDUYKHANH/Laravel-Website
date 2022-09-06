@extends('admin.main')

@section('noidung')

<p>
	{{$link->id}}
</p>
<p>
	{{$link->title}}
</p>
<p>
	{{$link->position}}
</p>
<p>
	{{$link->image}}
</p>
<p>
	{{$link->link}}
</p>
<p>
	{{$link->order}}
</p>
<p>
	{{$link->status}}
</p>
<p>
	@if($link->status==0)
    <a href='#' class='btn btn-secondary'>Ẩn</a>
    @elseif($link->status==1)
    <a href='#' class='btn btn-primary'>Hiện</a>
    @elseif($link->status==2)
    <a href='#' class='btn btn-primary'>Trang chủ</a>
    @endif
</p>

@endsection('noidung')