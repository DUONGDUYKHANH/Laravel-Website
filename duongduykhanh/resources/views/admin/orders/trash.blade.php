@extends('admin.main')
@section('noidung')
<table class="table table-striped projects">
              <thead>
                  <tr>
                      <th >
                          id
                     </th>
                      <th >
                          User
                      </th>
                      <th >
                          Total
                      </th>
                      <th >
                          Note
                      </th>
                      <th>
                        Action
                      </th>
                  </tr>
              </thead>
              <tbody>
                @foreach($orders as $order)
                <tr>
                  <td>
                    {{ $order->id}}
                  </td>
                  <td>
                    {{ $order->customer->customerName}}
                  </td>
                  <td>
                    {{ $order->total}}
                  </td>
                  <td>
                    {{ $order->note}}
                  </td>
                  <td>
                        <a href="/admin/order/{{$order->id }}"><i class="far fa-eye"></i></a>
                        <a href="/admin/order/{{$order->id }}/edit"><i class="far fa-edit"></i></a>
                        <a href="/admin/order/{{$order->id }}/trash"><i class="fas fa-trash"></i></a>
                      </td>
                </tr>
                @endforeach
              </tbody>
          </table>
          <div>{{$orders->links()}}</div>

@endsection('noidung')