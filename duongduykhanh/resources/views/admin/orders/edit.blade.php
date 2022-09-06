
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

<form action='/admin/order/{{$order->id}}' method=post>
		 @method('PUT')

	@csrf
              <div class="card-body">
              <div class="form-group">
                <label for="id">ID</label>
                <input type="text" id="id" class="form-control" name=id value="{{$order->id}}">
              </div>
              <div class="form-group">
                <label for="customer">Customer name:</label>
                <input type="text" id="customer" class="form-control" name=customer value="{{$order->customer->customerName}}">
              </div>
              <div class="form-group">
                <label for="total">Total:</label>
                <input type="text" id="total" class="form-control" name=total value="{{$order->total}}">
              </div>
     
              <div class="form-group">
                <label for="status">Status</label>
               <select name=status>
               	<option value=0 <?php if($order->status==0) echo "checked"?>>Ẩn</option>
               	<option value=1 <?php if($order->status==1) echo "checked"?>>Hiện</option>
                <option value=2 <?php if($order->status==2) echo "checked"?>>Trang chủ</option>
               </select>
              </div>
              <div class='form-group'>
              	<input type=submit value=submit>
              </div>
          </div>
              
</form>
@endsection('noidung')