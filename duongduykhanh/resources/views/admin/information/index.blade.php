@extends('admin.main')
@section('noidung')
<table class="table table-striped projects">
              <thead>
                  <tr>
                      <th >
                          id
                     </th>
                      <th >
                          Information Title
                      </th>
                      <th >
                          Slug
                      </th>
                      <th>
                          Summary
                      </th>
                      <th>
                        Status
                      </th>
                      <th>
                        Action
                      </th>
                  </tr>
              </thead>
              <tbody>
                @foreach($pages as $page)
                  <tr>
                      <td>
                        {{$page->id}}
                      </td>
                      <td>
                        {{$page->title}}
                      </td>
                      <td>
                        {{$page->slug}}
                      </td>
                      <td>
                        {{$page->summary}}
                      </td>
                      <td>
                        @if($page->status==0)
                        <a href='#' class='btn btn-secondary'>Ẩn</a>
                        @elseif($page->status==1)
                        <a href='#' class='btn btn-primary'>Hiện</a>
                        @endif
                      </td>
                      <td>
                        <a href="/admin/information/{{$page->id }}"><i class="far fa-eye"></i></a>
                        <a href="/admin/information/{{$page->id }}/edit"><i class="far fa-edit"></i></a>
                        <a href="/admin/information/{{$page->id }}/trash"><i class="fas fa-trash"></i></a>
                      </td>
                  </tr>
                  @endforeach
              </tbody>
          </table>
@endsection('noidung')