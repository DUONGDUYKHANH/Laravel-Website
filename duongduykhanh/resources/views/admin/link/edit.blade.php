
@extends('admin.main')
@section('noidung')
@if ($message =Session::get('success'))
	<div class="alert alert-success">
		<p>{{$message}}</p>
	</div>
@endif

@if ($errors->any())
    <div class="alert alert-danger">
      <ul>
        @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
@endif

<form action='/admin/link/{{$link->id}}' method=post>
		 @method('PUT')

	@csrf
              <div class="card-body">
              <div class="form-group">
                <label for="title">Title</label>
                <input type="text" id="title" class="form-control" name=title value="{{$link->title}}">
              </div>
              <div class="form-group">
                <label for="position">Position</label>
                <input type="number" id="position" class="form-control" name=position value="{{$link->position}}">
              </div>
     
              <div class="form-group">
                <label for="image">Image</label>
                <input type="text" id="image" class="form-control" name=image value="{{$link->image}}">
              </div>
              <div class="form-group">
                <label for="link">Link</label>
                <input type="text" id="link" class="form-control" name=link value="{{$link->link}}">
              </div>
              <div class="form-group">
                <label for="order">Order</label>
                <input type="number" id="order" class="form-control" name=order value="{{$link->order}}">
              </div>
              <div class="form-group">
                <label for="status">Status</label>
               <select name=status>
               	<option value=0 <?php if($link->status==0) echo "checked"?>>Ẩn</option>
               	<option value=1 <?php if($link->status==1) echo "checked"?>>Hiện</option>
                <option value=2 <?php if($link->status==2) echo "checked"?>>Trang chủ</option>
               </select>
              </div>
              <div class='form-group'>
              	<input type=submit value=submit>
              </div>
          </div>
              
</form>
@endsection('noidung')