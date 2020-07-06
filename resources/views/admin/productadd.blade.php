@extends('adminlte::page')
@section('css')
    <link rel="stylesheet" href="/css/admin.css">
    @endsection

@section('content')
 <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Add Products</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
                                  <form method="post" role="form" action="/addproduct" enctype="multipart/form-data">
                                    @csrf
                                    <div class="card-body">  
                                        <div class="form-group">
                                            <label for="productname"> Name</label>
                                            <input  type="text" class="form-control admin-field" id="name"
                                            name="name" placeholder="Enter name" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="materialno">Material Number</label>
                                            <input  type="text" class="form-control admin-field" id="materialno" name="materialno" placeholder="Enter material no">
                                        </div>
                                        <div class="form-group">
                                            <label for="conceptid">Concept ID</label>
                                            <input  type="text" class="form-control admin-field" id="conceptid" name="conceptid"placeholder="Enter concept id">
                                        </div>
                                        <div class="form-group">
                                            <label for="categoryid">Category ID</label>
                                            <input style= type="text" class="form-control admin-field" id="categoryid" name="categoryid" placeholder="Enter category id">
                                        </div>
                                        <div class="form-group">
                                            <label for="subcatid">Sub Category ID</label>
                                            <input  type="text" class="form-control admin-field" id="subcatid" name="subcatid" placeholder="Enter subcategory id">
                                        </div>
                                        <div class="form-group">
                                            <label for="compatability">Compatability</label>
                                            <input  type="text" class="form-control admin-field" id="compatability" name="compatability" placeholder="Enter compatability">
                                        </div>
                                        <div class="form-group">
                                            <label for="power">Power Consumption</label>
                                            <input  type="text" class="form-control admin-field" id="power" name="power" placeholder="Enter powerconsumption">
                                        </div>
                                        <div class="form-group">
                                            <label for="physicalspec">Physical Spec</label>
                                            <textarea   class="form-control admin-field" id="physicalspec" name="physicalspec" placeholder="Enter physical spec"></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="lightcolor">Light Color</label>
                                            <input  type="text" class="form-control admin-field" id="lightcolor" name="lightcolor" placeholder="Enter light color">
                                        </div>
                                        <div class="form-group">
                                            <label for="intro">Introduction</label>
                                            <textarea  class="form-control admin-field" id="intro" name="intro" placeholder="Enter intro"></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="accessories">Accessories Required</label>
                                            <input type="text" class="form-control admin-field" id="accessories" name="accessories" placeholder="Enter accessories">
                                        </div>
                                        <div class="form-group">
                                            <label for="warranty">Warranty</label>
                                            <input  type="text" class="form-control admin-field" id="warranty" name="warranty" placeholder="Enter warranty">
                                        </div>
                                        <div class="form-group">
                                            <label for="catid">Technical Spec</label>
                                            <textarea  class="form-control admin-field" id="tech" name="tech" placeholder="Enter technical spec"></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="addfea">Additionala Features</label>
                                            <input  type="text" class="form-control admin-field" id="addfea" name="addfea"placeholder="Enter additional features">
                                        </div>
                                        <div class="form-group">
                                            <label>Wired or Wireless</label>
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" name="wired" id="wired" value="wired" checked>
                                                    Wired
                                                </label>
                                            </div>
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" name="wired" id="wireless" value="wireless">
                                                    Wireless
                                                </label>
                                            </div>
                                            <div class="form-group">
                    <label for="exampleInputFile">Product Image</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" id="exampleInputFile"  name="proimages">
                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                      </div>
                      <div class="input-group-append">
                        <span class="input-group-text" id="">Upload</span>
                      </div>
                    </div>
                  </div>
                                            
                                       
                                    </div><!-- /.box-body -->

                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-primary">Add</button>
                                    </div>
                                </form>
                            </div><!-- /.box -->

@endsection