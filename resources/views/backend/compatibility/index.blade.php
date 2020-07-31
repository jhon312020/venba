@extends('backend.layouts.app')
@section('plugins.Datatables', true)
@section('plugins.Sweetalert2', true)
@section('content')
@include('backend.includes.partials.messages')
  <div class="page-header">
    <h1>List of Concepts</h1>
    <a  href="{{ route('admin.compatibility.add') }}" class="btn btn-success"> <i class="fa fa-plus-circle"></i>
    </a>
  </div>
  <table id="compatibilities" class="datatable table table-bordered table-striped">
    <thead>
      <tr>
        <th>S.No.</th>
        <th>Compatibility Name</th> 
        <th>Action</th>    
      </tr>
    </thead>
    <tbody>
      @isset($compatibilities)
      @foreach($compatibilities as $index => $item)
        <tr class="profile-table">
          <td> {{ $index + 1 }} </td>
          <td>{{ $item->name }} </td>
          <td> <span><a href= "{{ route('admin.compatibility.edit' , ['id' => $item->id]) }}" class="btn btn-success"><i class="fa fa-edit"></i></a> <a href= "{{ route('admin.compatibility.destroy', ['id' => $item->id]) }}" class="btn btn-danger" data-method="delete"><i class="fa fa-trash"></i></a></span></td>
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