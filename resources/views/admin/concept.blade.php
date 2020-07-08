@extends('adminlte::page')
@section('css')
  <link rel="stylesheet" href="/css/admin.css">
@endsection

@section('content')
 
  <div class="card card-primary">
    <div class="card-header">
      <h3 class="card-title">Add Concept</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form method="post" role="form" action="/conceptadded">
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
  @if (!empty($success))
    <h6 align="center" style="color:green">{{$success}}</h6>
  @endif
  <table class="table table-striped">
  <thead>
    <tr>
    <th>ID</th>
    <th>Concept Name</th>    
    </tr>
  </thead>
  <tbody>

  @isset($categories)
  @foreach($categories as $item)

    <tr class="profile-table">
    <td> {{ $item->id }} </td>

    <td>{{ $item->name }} </td>
    <td> <span><button type="submit" class="btn btn-primary">Edit</button> <button style="display: inline" type="submit" class="btn btn-primary">Delete</button></span></td>
    
    </tr>
  @endforeach
  @endisset

  </tbody>
  </table>

@endsection