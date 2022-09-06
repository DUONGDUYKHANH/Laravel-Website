@extends('admin.main')

@section('noidung')
@if ($message = Session::get('success'))
  <div class="alert alert-success">
    <p>{{$message}}</p>
  </div>
  @endif

<table class="table table-striped projects">
              <thead>
                  <tr>
                      <th >
                          id
                     </th>
                      <th >
                          Brand Name
                      </th>
                      <th >
                          Slug
                      </th>
                      <th >
                          descriptinon
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
              	@foreach($brands as $brand)
                  <tr>
                      <td>
                      	{{$brand->id}}
                      </td>
                      <td>
                      	{{$brand->brandName}}
                      </td>
                      <td>
                      	{{$brand->slug}}
                      </td>
                      <td>
                      	<?php echo $brand->description ?>
                      </td>
                      <td>
                      	@if($brand->status==0)
                        <a href='#' class='btn btn-secondary'>Ẩn</a>
                        @elseif($brand->status==1)
                        <a href='#' class='btn btn-primary'>Hiện</a>
                        @elseif($brand->status==2)
                        <a href='#' class='btn btn-primary'>Trang chủ</a>
                        @endif
                      </td>
                      <td>
                      	<a href="/admin/brand/{{$brand->id }}"><i class="far fa-eye"></i></a>
                      	<a href="/admin/brand/{{$brand->id }}/edit"><i class="far fa-edit"></i></a>
                      	<a href="/admin/brand/{{$brand->id }}/trash"><i class="fas fa-trash"></i></a>
                      </td>
                  </tr>
                  @endforeach
                  
                  
                  
                  
                  
                  
                  
              </tbody>
          </table>
          <div>{{$brands->links()}}</div>

@endsection('noidung')