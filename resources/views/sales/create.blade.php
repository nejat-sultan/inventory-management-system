@extends('layouts.adminpanel')
@section('content')

      <div class="row"> 
        <div class="col-md-12 col-lg-12">
            <h3 class="mb-3" id="titles"> Create Sales Order </h3>
            
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
                      <form action="{{ url('sales') }}" method="post" enctype="multipart/form-data">
                      {!! csrf_field() !!}
                        <div class="row g-0">
                          <div class="col-lg-12">
                            <div class="p-5">

                                <div class="row">
                                  <div class="col-md-6 mb-4 pb-2">
                                    <div class="form-outline">
                                      <label class="form-label" for="form3Examplev2">Sales No</label> 
                                      <input type="text" name="InvoiceNo" id="InvoiceNo" class="form-control form-control-lg" />
                                    </div>
                                  </div>

                                  <div class="col-md-6 mb-4 pb-2">
                                    <div class="form-outline">
                                      <label class="form-label" for="form3Examplev3">Sales Date</label>
                                      <input type="date" name="Date" id="Date" class="form-control form-control-lg" />
                                    </div>
                                  </div>
                                </div>

                                <div class="row">
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
                                      <label class="form-label" for="form3Examplev4">Customer</label>
                                      <select name="CustomerID" id="CustomerID" class="form-control">
                                        @foreach($customers as $id => $name)
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
                                      <label class="form-label" for="form3Examplev4">Amount</label>
                                      <input type="text" name="Amount" id="Amount" class="form-control form-control-lg" />
                                    </div>
                                  </div>
                                
                                  <div class="col-md-6 mb-4 pb-2">
                                    <div class="form-outline">
                                      <label class="form-label" for="form3Examplev3">Quantity</label>
                                      <input type="text" name="Quantity" id="Quantity" class="form-control form-control-lg" />
                                    </div>
                                  </div> 

                                </div>

                                <input type="submit" id="submitbtn" value="Add Sales" class="btn btn-success btn-lg"></br>
                                
                            </div> 
                          </div> 

                        </div>
                  
                      </form>
                    </div>
 
                </div>

        </div>
    </div>

@stop