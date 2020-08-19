@extends('backend.layouts.app')
@section('plugins.Datatables', true)
@section('plugins.Sweetalert2', true)
@section('content')
@include('backend.includes.partials.messages')
  <div class="page-header">
    <h1>List of Products</h1>
    <a  href="{{ route('admin.product.add') }}" class="btn btn-success"> <i class="fa fa-plus-circle"></i>
    </a>
  </div>
  @if (!empty($products->msg))
    <h6 align="center" style="color:green">{{$products->msg}}</h6>
  @endif
  <table id="products" class="datatable table table-bordered table-striped">
    <thead>
      <tr>
        <th>S.No.</th>
        <th>Material Number</th> 
        <th>Action</th>    
      </tr>
    </thead>
    <tbody>
      @isset($products)
      @foreach($products as $index => $item)
        <tr class="profile-table">
          <td> {{ $index + 1 }} </td>
          <td>{{ $item->product_no }} </td>
          <td> <span><a href= "{{ route('admin.product.edit' , ['id' => $item->id]) }}" class="btn btn-success"><i class="fa fa-edit"></i></a> <a href= "{{ route('admin.product.destroy', ['id' => $item->id]) }}" class="btn btn-danger" data-method="delete"><i class="fa fa-trash"></i></a></span></td>
        </tr>
      @endforeach
      @endisset
  </tbody>
  </table>
@endsection
@section('js')
  <script src="{{ URL::asset('js/backend.js') }}"></script>
  <script type='text/javascript'>
    $(document).ready(function() {
      $(".datatable").DataTable();
    });
  </script>
@stop