@extends('frontend.main')
@section('noidung')
<div class="span9">
    <ul class="breadcrumb">
    <li><a href="/">Home</a> <span class="divider">/</span></li>
    <li><a href="/category/hoa-kho">Products</a> <span class="divider">/</span></li>
    <li class="active">product Details</li>
    </ul>	
	<div class="row">	  
			<div id="gallery" class="span3">
            <a href="{{asset('img/product'.'/'.$products->image)}}" title="{{$products->productName}}">
				<img src="{{asset('img/product'.'/'.$products->image)}}" style="width:100%" alt="{{$products->productName}}">
            </a>
			
			  

			</div>
			<div class="span6">
				<h3>{{$products->productName}}</h3>
				
				<hr class="soft">
				<form class="form-horizontal qtyFrm">
				  <div class="control-group">
					<label class="control-label"><span>{{$products->price}}</span></label>
					<label class="control-label"><span>{{$products->salePrice}}</span></label>
					<div class="controls">
					
					  <button type="submit" class="btn btn-large btn-primary pull-right"> Add to cart <i class=" icon-shopping-cart"></i></button>
					</div>
				  </div>
				</form>
				
				<hr class="soft">
				
				
				<hr class="soft clr">
				
				
				<br class="clr">
			<a href="#" name="detail"></a>
			<hr class="soft">
			</div>
			
			<div class="span9">
            <ul id="productDetail" class="nav nav-tabs">
              <li class="active"><a href="#home" data-toggle="tab">Product Details</a></li>
              <li><a href="#profile" data-toggle="tab">Related Products</a></li>
            </ul>
            <div id="myTabContent" class="tab-content">
              <div class="tab-pane fade active in" id="home">
			  <h4>Product Information</h4>
                <table class="table table-bordered">
				

				<div>
					{!!nl2br($products->detail)!!}
				</div>

				
				
				

				
				

				
				
              </div>
		<div class="tab-pane fade" id="profile">
		<div id="myTab" class="pull-right">
		 <a href="#listView" data-toggle="tab"><span class="btn btn-large"><i class="icon-list"></i></span></a>
		 <a href="#blockView" data-toggle="tab"><span class="btn btn-large btn-primary"><i class="icon-th-large"></i></span></a>
		</div>
		<br class="clr">
		<hr class="soft">
		<div class="tab-content">
			<div class="tab-pane" id="listView">
					<x-frontend.product-by-cat :catId="$products->catId" catName='SẢN PHẨM CÙNG LOẠI'/>
		</div>
				<br class="clr">
					 </div>
		</div>
          </div>

	</div>
</div>
@endsection