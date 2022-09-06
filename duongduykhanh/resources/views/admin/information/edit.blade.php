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

<form action="{{route('update.information', $data->id)}}" method=post>
	@csrf
              <div class="card-body">
              <div class="form-group">
                <label for="productName">Information title</label>
                <input type="text" id="productName" class="form-control" name="title" value="{{ $data->title }}" >
              </div>
              </div>
              <div class="form-group">
                <label for="detail">Content</label>
                <textarea class=editor name=content cols=80 rows=5>{{ $data->content}}</textarea>
              </div>
              <div class="form-group">
                <label for="detail">Summary</label>
                <textarea class=form-control name=summary cols=80 rows=5>{{ $data->summary}}</textarea>
              </div>
             <div class="form-group">
              <label>Status</label>
              <select class="form-control" name="status">
                <option @if($data->status == 1) selected @endif value="1">1</option>
                <option @if($data->status == 2) selected @endif value="2">2</option>
              </select>
             </div>
              <div class='form-group'>
              	<input type=submit value=submit>
              </div>
          </div>
              
</form>
@endsection('noidung')