@extends('frontend.main')

@section('noidung')
  <h1 style="text-align: center;">{{ $data->title }}</h1>
  {!! $data->content !!}
@endsection