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

<form action='/admin/brand' method=post>
	@csrf
              <div class="card-body">
              <div class="form-group">
                <label for="catName">Brand Name</label>
                <input type="text" id="brandName" class="form-control" name=brandName >
              </div>
              <div class="form-group">
                <label for="slug">Slug</label>
                <input type="text" id="slug" class="form-control" name=slug >
              </div>
     
              <div class="form-group">
                <label for="description">Description</label>
                <textarea class=editor name=description cols=80 rows=5></textarea>
              </div>
              <div class="form-group">
                <label for="status">Status</label>
               <select name=status>
               	<option value=0 >Ẩn</option>
               	<option value=1 >Hiện</option>
                <option value=2 >Trang chủ</option>
               </select>
              </div>
              <div class='form-group'>
              	<input type=submit value=submit>
              </div>
          </div>
              
</form>
@endsection('noidung')