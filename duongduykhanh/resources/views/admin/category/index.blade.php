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
                          Category Name
                      </th>
                      <th >
                          Slug
                      </th>
                      <th>
                          parentId
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
              	@foreach($categories as $category)
                  <tr>
                      <td>
                      	{{$category->id}}
                      </td>
                      <td>
                      	{{$category->catName}}
                      </td>
                      <td>
                      	{{$category->slug}}
                      </td>
                      <td>
                      	{{$category->parentId}}
                      </td>
                      <td>
                      	<?php echo $category->description ?>
                      </td>
                      <td>
                      	@if($category->status==0)
                        <a href='/admin/category/{{$category->id}}/toggleStatus' class='btn btn-secondary'>Ẩn</a>
                        @else
                        <a href='/admin/category/{{$category->id}}/toggleStatus' class='btn btn-primary'>Hiện</a>
                        @endif
                      </td>
                      <td>
                      	<a href="/admin/category/{{$category->id }}"><i class="far fa-eye"></i></a>
                      	<a href="/admin/category/{{$category->id }}/edit"><i class="far fa-edit"></i></a>
                      	<a href="/admin/category/{{$category->id }}/trash"><i class="fas fa-trash"></i></a>
                      </td>
                  </tr>
                  @endforeach
                  
                  
                  
                  
                  
                  
                  
              </tbody>
          </table>
          <div>{{$categories->links()}}</div>

@endsection('noidung')