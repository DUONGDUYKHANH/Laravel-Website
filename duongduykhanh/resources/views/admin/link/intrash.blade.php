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
                          Title
                      </th>
                      <th >
                          Position
                      </th>
                      <th >
                          image
                      </th>
                      <th >
                          link
                      </th>
                      <th >
                          order
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
                @foreach($links as $link)
                  <tr>
                      <td>
                        {{$link->id}}
                      </td>
                      <td>
                        {{$link->title}}
                      </td>
                      <td>
                        {{$link->position}}
                      </td>
                      <td>
                        <?php echo $link->image ?>
                      </td>
                      <td>
                        <?php echo $link->link ?>
                      </td>
                      <td>
                        <?php echo $link->order ?>
                      </td>
                      <td>
                        @if($link->status==0)
                        <a href='#' class='btn btn-secondary'>Ẩn</a>
                        @elseif($link->status==1)
                        <a href='#' class='btn btn-primary'>Hiện</a>
                        @elseif($link->status==2)
                        <a href='#' class='btn btn-primary'>Trang chủ</a>
                        @endif
                      </td>
                      <td>
                        <a href="/admin/link/{{$link->id }}/restore"><i class="fas fa-trash-restore"></i></a>

                        <form style='display: inline;'method="POST" action="/admin/link/{{$link->id}}">
                          @method('DELETE')
                          @csrf
                          <button class="btn btn-danger" type=submit>Delete</button>
                        </form>>
                      </td>
                  </tr>
                  @endforeach
                  
                  
                  
                  
                  
                  
                  
              </tbody>
          </table>
          <div>{{$links->links()}}</div>

@endsection('noidung')






