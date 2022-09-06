<?php use Gloudemans\Shoppingcart\Facades\Cart; ?>
@extends('frontend.main')
@section('noidung')
<div class="span9">
    <ul class="breadcrumb">
		<li><a href="index.html">Home</a> <span class="divider">/</span></li>
		<li class="active"> SHOPPING CART</li>
    </ul>
	<h3>  SHOPPING CART [ <small>3 Item(s) </small>]<a href="products.html" class="btn btn-large pull-right"><i class="icon-arrow-left"></i> Continue Shopping </a></h3>	
	<hr class="soft">
	<table class="table table-bordered">
		<tbody><tr><th> I AM ALREADY REGISTERED  </th></tr>
		 <tr> 
		 <td>
			<form class="form-horizontal">
				<div class="control-group">
				  <label class="control-label" for="inputUsername">Username</label>
				  <div class="controls">
					<input type="text" id="inputUsername" placeholder="Username">
				  </div>
				</div>
				<div class="control-group">
				  <label class="control-label" for="inputPassword1">Password</label>
				  <div class="controls">
					<input type="password" id="inputPassword1" placeholder="Password">
				  </div>
				</div>
				<div class="control-group">
				  <div class="controls">
					<button type="submit" class="btn">Sign in</button> OR <a href="register.html" class="btn">Register Now!</a>
				  </div>
				</div>
				<div class="control-group">
					<div class="controls">
					  <a href="forgetpass.html" style="text-decoration:underline">Forgot password ?</a>
					</div>
				</div>
			</form>
		  </td>
		  </tr>
	</tbody></table>		
			
	<table class="table table-bordered">
              <thead>
                <tr>
                  <th>Product</th>
                  <th>Description</th>
                  <th>Quantity/Update</th>
				  <th>Price</th>
                  <th>Total</th>
				</tr>
              </thead>
              <tbody>
    @foreach(Cart::content() as $row)

                <tr>
                  <td> <img width="60" src="{{asset('img/product/'.$row->options->image)}}" alt=""></td>
                  <td>{{$row->name}}</td>
				  <td>
					<div class="input-append"><input class="span1" style="max-width:34px" value={{$row->qty}} id="appendedInputButtons" size="16" type="text"><a href='/cart_dec/{{$row->rowId}}' class="btn" type="button"><i class="icon-minus"></i></a><a href='/cart_inc/{{$row->rowId}}' class="btn" type="button"><i class="icon-plus"></i></a><a href='/cart_Delete/{{$row->rowId}}' class="btn btn-danger" type="button"><i class="icon-remove icon-white"></i></a>				</div>
				  </td>
                  <td>{{$row->price}}</td>
                  <td>{{($row->price)*($row->qty)}}</td>
                </tr>
      @endforeach
					
                <tr>
                  <td colspan="6" style="text-align:right">Total Price:	</td>
                  <td>{{Cart::priceTotal()}}</td>
                </tr>

                 <tr>
                  <td colspan="6" style="text-align:right">Total Tax:	</td>
                  <td>{{Cart::tax()}}</td>
                </tr>
				 <tr>
                  <td colspan="6" style="text-align:right"><strong>TOTAL ({{Cart::priceTotal()}} + {{Cart::tax()}}) =</strong></td>
                  <td class="label label-important" style="display:block"> <strong>{{Cart::total()}}</strong></td>
                </tr>
				</tbody>
            </table>
		
		
            <table class="table table-bordered">
			<tbody>
				 <tr>
                  <td> 
				<form class="form-horizontal">
				<div class="control-group">
				<label class="control-label"><strong> VOUCHERS CODE: </strong> </label>
				<div class="controls">
				<input type="text" class="input-medium" placeholder="CODE">
				<button type="submit" class="btn"> ADD </button>
				</div>
				</div>
				</form>
				</td>
                </tr>
				
			</tbody>
			</table>
			
			<table class="table table-bordered">
			 <tbody><tr><th>ESTIMATE YOUR SHIPPING </th></tr>
			 <tr> 
			 <td>
				<form class="form-horizontal">
				  <div class="control-group">
					<label class="control-label" for="inputCountry">Country </label>
					<div class="controls">
					  <input type="text" id="inputCountry" placeholder="Country">
					</div>
				  </div>
				  <div class="control-group">
					<label class="control-label" for="inputPost">Post Code/ Zipcode </label>
					<div class="controls">
					  <input type="text" id="inputPost" placeholder="Postcode">
					</div>
				  </div>
				  <div class="control-group">
					<div class="controls">
					  <button type="submit" class="btn">ESTIMATE </button>
					</div>
				  </div>
				</form>				  
			  </td>
			  </tr>
            </tbody></table>		
	<a href="products.html" class="btn btn-large"><i class="icon-arrow-left"></i> Continue Shopping </a>
	<a href="/checkout" class="btn btn-large pull-right">Checkout <i class="icon-arrow-right"></i></a>
	
</div>
@endsection