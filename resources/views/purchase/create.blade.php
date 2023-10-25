@extends('layouts.adminpanel')
@section('content')

      <div class="row"> 
        <div class="col-md-12 col-lg-12">
            <h3 class="mb-3" id="titles"> Create Purchase </h3>
            
                <div class="card">
                    <div class="card-header">
                        <div class="col-md-8 col-lg-10"></div>
                        <div class="col-md-4 col-lg-2">
                            <a href="{{ url('/purchase') }}" class="btn btn-success btn-sm" id="addbutton" title="Back">
                                <i class="fa fa-arrow-left" aria-hidden="true"></i> Back
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                      <form action="{{ url('purchase') }}" method="post" enctype="multipart/form-data">
                      {!! csrf_field() !!}
                        <div class="row g-0">
                          <div class="col-lg-12">
                            <div class="p-5">

                                <div class="row">
                                  <div class="col-md-6 mb-4 pb-2">
                                    <div class="form-outline">
                                      <label class="form-label" for="form3Examplev2">Purchase No</label> 
                                      <input type="text" name="PurchaseNo" id="PurchaseNo" class="form-control form-control-lg" />
                                    </div>
                                  </div>
                                
                                  <div class="col-md-6 mb-4 pb-2">
                                    <div class="form-outline">
                                      <label class="form-label" for="form3Examplev3">Purchase Date</label>
                                      <input type="date" name="PurchaseDate" id="PurchaseDate" class="form-control form-control-lg" />
                                    </div>
                                  </div>
                                </div>

                                <div class="row">
                                  <div class="col-md-4 mb-4 pb-2">
                                    <div class="form-outline">
                                      <label class="form-label" for="form3Examplev4">Supplier</label>
                                      <select name="SupplierID" id="SupplierID" class="form-control">
                                        @foreach($suppliers as $id => $name)
                                        <option value="{{ $id }}">{{ $name }}</option>
                                        @endforeach
                                      </select>
                                    </div>
                                  </div>

                                  <div class="col-md-4 mb-4 pb-2">
                                    <div class="form-outline">
                                      <label class="form-label" for="form3Examplev4">Category</label>
                                      <select name="CategoryID" id="CategoryID" class="form-control">
                                        @foreach($categories as $id => $name)
                                        <option value="{{ $id }}">{{ $name }}</option>
                                        @endforeach
                                      </select>
                                    </div>
                                  </div>

                                  <div class="col-md-4 mb-4 pb-2">
                                    <div class="form-outline">
                                      <label class="form-label" for="form3Examplev4">Product</label>
                                      <select name="ProductID" id="ProductID" class="form-control">
                                        @foreach($products as $id => $name)
                                        <option value="{{ $id }}">{{ $name }}</option>
                                        @endforeach
                                      </select>
                                    </div>
                                  </div>

                                </div>

                                <div class="row">
                                 
                                  <div class="col-md-6 mb-4 pb-2">
                                    <div class="form-outline">
                                      <label class="form-label" for="form3Examplev4">Discount</label>
                                      <input type="text" name="Discount" id="Discount" class="form-control form-control-lg" />
                                    </div>
                                  </div>
                                
                                  <div class="col-md-6 mb-4 pb-2">
                                    <div class="form-outline">
                                      <label class="form-label" for="form3Examplev3">Quantity</label>
                                      <input type="text" name="Quantity" id="Quantity" class="form-control form-control-lg" />
                                    </div>
                                  </div> 
                                </div>

                                <input type="submit" id="submitbtn" value="Add Purchase" class="btn btn-success btn-lg"></br>
                                
                            </div> 
                          </div> 

                        </div>
                  
                      </form>
                    </div>
 
                </div>

        </div>
    </div>

@stop