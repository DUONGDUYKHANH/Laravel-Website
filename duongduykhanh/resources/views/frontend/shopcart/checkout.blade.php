@extends('frontend.main')
@section('noidung')
<form class="form-horizontal" method=post action='/doCheckout'>
	@csrf
	<input type=hidden name=id value={{$customer->id}}>
		<h4>Your personal information</h4>

		<div class="control-group">
			<label class="control-label" for="inputFname1">Customer Name <sup>*</sup></label>
			<div class="controls">
			  <input type="text" placeholder="customerName" name='customerName' value='{{$customer->customerName}}'>
			</div>
		 </div>
		 <div class="control-group">
			<label class="control-label" >Address <sup>*</sup></label>
			<div class="controls">
			  <input type="text" placeholder="Address" name='address' value='{{$customer->address}}'>
			</div>
		 </div>
		 <div class="control-group">
			<label class="control-label" >Phone <sup>*</sup></label>
			<div class="controls">
			  <input type="text" placeholder="phone" name='phone' value='{{$customer->phone}}'>
			</div>
		 </div>
		 <div class="control-group">
			<label class="control-label" >Email <sup>*</sup></label>
			<div class="controls">
			  <input type="email" placeholder="email" name='email' value='{{$customer->email}}'>
			</div>
		 </div>
		 <div class="control-group">
			<label class="control-label" >Note</label>
			<div class="controls">
			  <textarea cols=50 rows=5 name='note'></textarea>
			</div>
		 </div>

	  <input type=submit name=submit value=submit>
	  		
	</form>
	@endsection