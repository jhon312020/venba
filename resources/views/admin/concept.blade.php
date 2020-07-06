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

@endsection