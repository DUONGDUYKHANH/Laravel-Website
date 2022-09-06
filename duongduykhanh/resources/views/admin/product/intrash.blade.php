@extends('admin.main')

@section('noidung')
@if ($message = Session::get('success'))
  <div class="alert alert-success">
    <p>{{$messege}}</p>
  </div>
  @endif

<table class="table table-striped projects">
              <thead>
                  <tr>
                      <th >
                          id
                     </th>
                      <th >
                          Product Name
                      </th>
                      <th >
                          Slug
                      </th>
                      <th>
                          catName
                      </th>
                      <th>
                          brandName
                      </th>
                      <th >
                          price
                      </th>
                      <th >
                          salePrice
                      </th>
                      <th >
                          image
                      </th>
                      <th >
                        status
                      </th>
                      <th>
                        Action
                      </th>
                  </tr>
              </thead>
              <tbody>
                @foreach($products as $product)
                  <tr>
                      <td>
                        {{$product->id}}
                      </td>
                      <td>
                        {{$product->productName}}
                      </td>
                      <td>
                        {{$product->slug}}
                      </td>
                      <td>
                        {{$product->catName}}
                      </td>
                      <td>
                        {{$product->brandName}}
                      </td>
                      <td>
                        {{$product->price}}
                      </td>
                      <td>
                        {{$product->salePrice}}
                      </td>
                      <td>
                        {{$product->image}}
                      </td>
                      <td>
								<a href="/admin/product/{{$product->id}}/restore"><i class="fas fa-trash-restore"></i></a>

								<form style='display: inline;'method="POST" action="/admin/product/{{$product->id}}">
									@method('DELETE')
									@csrf
									<button class="btn btn-danger" type=submit>Delete</button>
								</form>
						</td>
                  </tr>
                  @endforeach
                  
                  
                  
                  
                  
                  
                  
              </tbody>
          </table>
          <div>{{$products->links()}}</div>

@endsection('noidung')