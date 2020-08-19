@extends('backend.layouts.app')
@section('plugins.Datatables', true)
@section('plugins.Sweetalert2', true)
@section('content')
@include('backend.includes.partials.messages')
  <div class="page-header">
    <h1>List of Types</h1>
    <a  href="{{ route('admin.type.add') }}" class="btn btn-success"> <i class="fa fa-plus-circle"></i>
    </a>
  </div>
  <table id="types" class="datatable table table-bordered table-striped">
    <thead>
      <tr>
        <th>S.No.</th>
        <th>Name</th>
        <th>Email</th> 
        <th>Mobile No</th>
        <th>Action</th>    
      </tr>
    </thead>
    <tbody>
      @isset($users)
      @foreach($users as $index => $item)
        <tr class="profile-table">
          <td> {{ $index + 1 }} </td>
          <td>{{ $item->name}} </td>
          <td>{{$item->email}}</td>
          <td>{{$item->mobile_number}}</td>
          <td> <span><a href= "{{ route('admin.type.edit' , ['id' => $item->id]) }}" class="btn btn-success"><i class="fa fa-edit"></i></a> <a href= "{{ route('admin.type.destroy', ['id' => $item->id]) }}" class="btn btn-danger" data-method="delete"><i class="fa fa-trash"></i></a></span></td>
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