@extends('admin.main')

@section('noidung')

<p>
  {{$page->id}}
</p>
<p>
  {{$page->title}}
</p>
<p>
  {{$page->slug}}
</p>
<p>
  {{$page->content}}
</p>
<p>
  {{$page->summary}}
</p>
<p>
  {{$page->status}}
</p>
<p>
  <?php if($page->status==0) echo "Ẩn"; else echo "Hiện"; ?>
</p>

@endsection('noidung')