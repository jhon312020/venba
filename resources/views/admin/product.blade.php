@extends('adminlte::page')

@section('css')
  <link rel="stylesheet" href="/css/admin.css">
@endsection
@section('js')
  <script src="{{ URL::asset('js/datatables.js') }}"></script>
@stop
@section('content')
<span style="display: inline-block;margin-bottom: 50px">
    <h1 style="display: inline">List of Products</h1>
    <a  href="{{ action('ProductController@add')}}" style="display: inline;position: absolute;right: 10px;margin-top: 5px" class="btn btn-primary"> Add New Product
    </a>
  </span>
  @if (!empty($product->msg))
    <h6 align="center" style="color:green">{{$product->msg}}</h6>
  @endif
     
  <table id="example1" class="table table-bordered table-striped">
  <thead>
    <tr>
    <th>ID</th>
    <th>Name</th> 
    <th>Material No</th> 
    <th>Compatibility</th>
    <th>Light Color</th>  
    <th>Action</th> 
    </tr>
  </thead>
  <tbody>

  @isset($product)
  @foreach($product as $item)

    <tr class="profile-table">
    <td> {{ $item->id }} </td>

    <td>{{ $item->name }} </td>
    <td>{{ $item->material_no }} </td>
    <td>{{ $item->compatibility }} </td>
    <td>{{ $item->light_color }} </td>
    <td> <span><a href= "{{ action('CategoryController@edit', ['id' => $item->id ])}}" class="btn btn-primary">Edit</a> <a href= "{{ action('CategoryController@delete', ['id' => $item->id ])}}" style="display: inline" class="btn btn-primary">Delete</a></span></td>
    
    </tr>
  @endforeach
  @endisset

  </tbody>
  </table>

@endsection