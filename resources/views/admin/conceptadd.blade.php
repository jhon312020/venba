@extends('adminlte::page')
@section('css')
  <link rel="stylesheet" href="/css/admin.css">
@endsection
@section('js')
  <script src="{{ URL::asset('js/conceptedit.js') }}"></script>
@stop

@section('content')
 
  <div class="card card-primary">
    <div class="card-header">
      <h3 class="card-title">Add Concept</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form id="conceptAddForm" method="post" role="form" action="">
      @csrf
      <div class="card-body">     	
      <div class="form-group">
          <label for="addconcept">Name</label>
          <input  type="text" class="form-control admin-field" id="addconcept" name="addconcept"placeholder="Enter new concept" required>
        </div>
      </div><!-- /.box-body -->
      <div class="card-footer">
        <button type="submit" class="btn btn-primary">Add</button>
      </div>
    </form>
    
  </div><!-- /.box -->
  <div id="success"></div>
 <!--  @if (!empty($success))
    <h6 align="center" style="color:green">{{$success}}</h6>
  @endif -->
@endsection 