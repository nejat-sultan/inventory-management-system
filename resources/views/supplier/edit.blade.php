@extends('layouts.adminpanel')
@section('content')

      <div class="row"> 
        <div class="col-md-12 col-lg-12">
            <h3 class="mb-3" id="titles"> Edit Supplier </h3>
            
                <div class="card">
                    <div class="card-header">
                        <div class="col-md-8 col-lg-10"></div>
                        <div class="col-md-4 col-lg-2">
                            <a href="{{ url('/supplier') }}" class="btn btn-success btn-sm" id="addbutton" title="Back">
                                <i class="fa fa-arrow-left" aria-hidden="true"></i> Back
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                      <form action="{{ url('supplier/' .$suppliers->id) }}" method="post" enctype="multipart/form-data">
                      {!! csrf_field() !!}
                      @method("PATCH")
                        <input type="hidden" name="id" id="id" value="{{$suppliers->id}}" id="id" />
                        <div class="row g-0">
                          <div class="col-lg-12">
                            <div class="p-5">

                                <div class="row">
                                  <div class="col-md-6 mb-4 pb-2">
                                    <div class="form-outline">
                                      <label class="form-label" for="form3Examplev2">Full name</label> 
                                      <input type="text" name="Name" id="Name" value="{{$suppliers->Name}}" class="form-control form-control-lg" />
                                    </div>
                                  </div>
                                
                                  <div class="col-md-6 mb-4 pb-2">
                                    <div class="form-outline">
                                      <label class="form-label" for="form3Examplev3">Phone Number</label>
                                      <input type="text" name="Phoneno" id="Phoneno" value="{{$suppliers->Phoneno}}" class="form-control form-control-lg" />
                                    </div>
                                  </div>
                                </div>

                                <div class="row">
                                  <div class="col-md-6 mb-4 pb-2">
                                    <div class="form-outline">
                                      <label class="form-label" for="form3Examplev4">Email</label>
                                      <input type="text" name="Email" id="Email" value="{{$suppliers->Email}}" class="form-control form-control-lg" />
                                    </div>
                                  </div>

                                  <div class="col-md-6 mb-4 pb-2">
                                    <div class="form-outline">
                                      <label class="form-label" for="form3Examplev4">Address</label>
                                      <input type="text" name="Address" id="Address" value="{{$suppliers->Address}}" class="form-control form-control-lg" />
                                    </div>
                                  </div>
                                </div>

                                <input type="submit" id="submitbtn" value="Update" class="btn btn-success btn-lg"></br>
                                
                            </div> 
                          </div> 

                        </div>
                  
                      </form>
                    </div>
 
                </div>
        </div>
    </div>

@stop