@extends('backend.layouts.app')
@section('plugins.Datatables', true)
@section('plugins.Sweetalert2', true)
@section('js')
  <script src="{{ URL::asset('js/backend.js') }}"></script>
@stop
@section('content')
@include('backend.includes.partials.messages')
  <div class="page-header">
    <h1>List of Concepts</h1>
    <a  href="{{ route('admin.concept.add') }}" class="btn btn-success"> <i class="fa fa-plus-circle"></i>
    </a>
  </div>
  <table id="concepts" class="datatable table table-bordered table-striped">
    <thead>
      <tr>
        <th>S.No.</th>
        <th>Concept Name</th> 
        <th>Action</th>    
      </tr>
    </thead>
    <tbody>
      @isset($concepts)
      @foreach($concepts as $index => $item)
        <tr class="profile-table">
          <td> {{ $index + 1 }} </td>
          <td>{{ $item->name }} </td>
          <td> <span><a href= "{{ route('admin.concept.edit' , ['id' => $item->id]) }}" class="btn btn-success"><i class="fa fa-edit"></i></a> <a href= "{{ route('admin.concept.destroy', ['id' => $item->id]) }}" class="btn btn-danger" data-method="delete"><i class="fa fa-trash"></i></a></span></td>
        </tr>
      @endforeach
      @endisset
  </tbody>
  </table>

@endsection