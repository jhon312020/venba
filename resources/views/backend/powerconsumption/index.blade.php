@extends('backend.layouts.app')
@section('plugins.Datatables', true)
@section('plugins.Sweetalert2', true)
@section('content')
@include('backend.includes.partials.messages')
  <div class="page-header">
    <h1>List of Concepts</h1>
    <a  href="{{ route('admin.powerconsumption.add') }}" class="btn btn-success"> <i class="fa fa-plus-circle"></i>
    </a>
  </div>
  <table id="powerconsumptions" class="datatable table table-bordered table-striped">
    <thead>
      <tr>
        <th>S.No.</th>
        <th>Powerconsumption Name</th> 
        <th>Action</th>    
      </tr>
    </thead>
    <tbody>
      @isset($powerconsumptions)
      @foreach($powerconsumptions as $index => $item)
        <tr class="profile-table">
          <td> {{ $index + 1 }} </td>
          <td>{{ $item->name }} </td>
          <td> <span><a href= "{{ route('admin.powerconsumption.edit' , ['id' => $item->id]) }}" class="btn btn-success"><i class="fa fa-edit"></i></a> <a href= "{{ route('admin.powerconsumption.destroy', ['id' => $item->id]) }}" class="btn btn-danger" data-method="delete"><i class="fa fa-trash"></i></a></span></td>
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