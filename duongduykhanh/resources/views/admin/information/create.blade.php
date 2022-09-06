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

<form action="{{route('store.information')}}" method=post>
	@csrf
              <div class="card-body">
              <div class="form-group">
                <label for="productName">Information title</label>
                <input type="text" id="productName" class="form-control" name="title" >
              </div>
              </div>
              <div class="form-group">
                <label for="detail">Content</label>
                <textarea class=editor name=content cols=80 rows=5></textarea>
              </div>
              <div class="form-group">
                <label for="detail">Summary</label>
                <textarea class=form-control name=summary cols=80 rows=5></textarea>
              </div>
             <div class="form-group">
              <label>Status</label>
              <select class="form-control" name="status">
                <option value="0">Ẩn</option>
                <option value="1">Hiện</option>
              </select>
             </div>
              <div class='form-group'>
              	<input type=submit value=submit>
              </div>
          </div>
              
</form>
@endsection('noidung')