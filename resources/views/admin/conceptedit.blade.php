@extends('adminlte::page')
@section('css')
  <link rel="stylesheet" href="/css/admin.css">
  <meta name="csrf-token" content="{{ csrf_token() }}">
@endsection
@section('js')
  <script src="{{ URL::asset('js/conceptedit.js') }}"></script>
@stop

@section('content')
   
  <div class="card card-primary">
    <div class="card-header">
      <h3 class="card-title">Edit Concept</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    @isset($fetchconcept)
    <form id="conceptEditForm" method="post" role="form" action="{{action('ConceptAddEdit@update')}}">
      @csrf
      <div class="card-body">     	
      <div class="form-group">
          <label for="addconcept">Name</label>
          @foreach($fetchconcept as $item)
          <input name="id" id="id"value="{{$item->id}}" type="hidden">
          <input  type="text" class="form-control admin-field" value="{{$item->name}}" id="editconcept" name="editconcept"placeholder="Enter new concept" required>
         
        </div>
      </div><!-- /.box-body -->
      <div class="card-footer">
        <button type="submit" value=" {{$item->id}}"  class="btn btn-primary">Save Edit</button>
      </div>
    </form>
     @endforeach
    @endisset
    
  </div><!-- /.box -->
  <div id="success"></div>
  <!-- @isset($fetchconcept->msg)
    
  @endisset -->
  
@endsection 