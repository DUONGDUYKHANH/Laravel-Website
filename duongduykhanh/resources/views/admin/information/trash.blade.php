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
                        <a href="/admin/information/revert/{{$page->id}}"><i class="fas fa-trash-restore"></i></a>
                      </td>
                  </tr>
                  @endforeach
              </tbody>
          </table>
@endsection('noidung')