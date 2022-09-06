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

<form action='/admin/product/{{$product->id}}' method=post>
     @method('PUT')
     @csrf
              <div class="card-body">
              <div class="form-group">
                <label for="productName">Category Name</label>
                <input type="text" id="productName" class="form-control" name=productName value="{{$product->productName}}">
              </div>
              <div class="form-group">
                <label for="slug">Slug</label>
                <input type="text" id="slug" class="form-control" name=slug value="{{$product->slug}}">
              </div>
                <div class="form-group">
                <label for="catId">CatName</label>
                <select name=catId>
                @foreach($categories1 as $category1)
                <optgroup label="{{$category1->catName}}"


                  >
                    @foreach($categories2 as $category2)
                    @if($category2->parentId==$category1->id)
                    <option value={{$category2->id}}

                      @if($category2->id==$product->catId)
                      "selected"
                      @endif

                      >{{$category2->catName}}</option>
                    @endif
                    @endforeach
                </optgroup>
                @endforeach

                </select>
              </div>
              <div class="form-group">
                <label for="brandId">BrandName</label>
                <select name=brandId>
                  @foreach($brands as $brand)
                <option value='{{$brand->id}}'

                      @if($brand->id==$product->brandId)
                      "selected"
                      @endif

                  >{{$brand->brandName}}</option>
                @endforeach
                </select>
              </div>
              <div class="form-group">
                <label for="detail">detail</label>
                <textarea class=editor name=detail cols=80 rows=5>
                  {{$product->detail}}
                </textarea>
              </div>
              <div class="form-group">
                <label for="price">Price</label>
                <input type="number" id="price" class="form-control" name=price value="{{$product->price}}">
              </div>
              <div class="form-group">
                <label for="salePrice">Sale Price</label>
                <input type="number" id="salePrice" class="form-control" name=salePrice value="{{$product->salePrice}}">
              </div>
              <div class="form-group">
                <label for="image">Image</label>
                <input type="text" id="image" class="form-control" name=image value="{{$product->image}}">
              </div>
              <div class="form-group">
                <label for="status">Status</label>
               <select name=status>
                <option value=0 
                @if($product->status==0)
                selected
                @endif

                >Ẩn</option>
                <option value=1 
                @if($product->status==1)
                selected
                @endif
                >Hiện</option>
                <option value=2 
                @if($product->status==2)
                selected
                @endif
                >Hiện trên trang chủ</option>
               </select>
              </div>
              <div class='form-group'>
                <input type=submit value=submit>
              </div>
          </div>
              
</form>
@endsection('noidung')








