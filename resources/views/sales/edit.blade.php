@extends('layouts.adminpanel')
@section('content')

      <div class="row"> 
        <div class="col-md-12 col-lg-12">
            <h3 class="mb-3" id="titles"> Edit Payment Status </h3>
            
                <div class="card">
                    <div class="card-header">
                        <div class="col-md-8 col-lg-10"></div>
                        <div class="col-md-4 col-lg-2">
                            <a href="{{ url('/sales') }}" class="btn btn-success btn-sm" id="addbutton" title="Back">
                                <i class="fa fa-arrow-left" aria-hidden="true"></i> Back
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                      <form action="{{ url('sales/' .$sales->id) }}" method="post" enctype="multipart/form-data">
                      {!! csrf_field() !!}
                      @method("PATCH")
                        <input type="hidden" name="id" id="id" value="{{$sales->id}}" id="id" />
                        <div class="row g-0">
                          <div class="col-lg-12">
                            <div class="p-5">

                                <div class="row">
                                  <div class="col-md-10 mb-4 pb-2">
                                    <div class="form-outline mb-4">
                                      <label class="form-label" for="form3Examplev2">Name</label> 
                                      <input type="text" name="PaidStatus" id="PaidStatus" value="{{$sales->PaidStatus}}" class="form-control form-control-lg" />

                                    </div>
                                    <input type="submit" id="submitbtn" value="Update" class="btn btn-success btn-lg"></br>
                                  </div>

                            </div> 
                          </div> 

                        </div>
                  
                      </form>
                    </div>
 
                </div>
        </div>
    </div>

@stop