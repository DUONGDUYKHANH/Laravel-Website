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

<form action='/admin/category' method=post>
	@csrf
              <div class="card-body">
              <div class="form-group">
                <label for="catName">Category Name</label>
                <input type="text" id="catName" class="form-control" name=catName >
              </div>
              <div class="form-group">
                <label for="slug">Slug</label>
                <input type="text" id="slug" class="form-control" name=slug >
              </div>
                <div class="form-group">
                <label for="parentId">ParenId</label>
                <select name=parentId>
                @foreach ($categoriesLevel1 as $cat)
                <option value=0>---</option>
                  <option value='{{$cat->id}}'>{{$cat->catName}}</option>
                
                @endforeach
                </select>
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
               </select>
              </div>
              <div class='form-group'>
              	<input type=submit value=submit>
              </div>
          </div>
              
</form>
@endsection('noidung')