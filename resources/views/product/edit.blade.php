@extends('layouts.adminpanel')
@section('content')

      <div class="row"> 
        <div class="col-md-12 col-lg-12">
            <h3 class="mb-3" id="titles"> Edit Product </h3>
            
                <div class="card">
                    <div class="card-header">
                        <div class="col-md-8 col-lg-10"></div>
                        <div class="col-md-4 col-lg-2">
                            <a href="{{ url('/product') }}" class="btn btn-success btn-sm" id="addbutton" title="Back">
                                <i class="fa fa-arrow-left" aria-hidden="true"></i> Back
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                      <form action="{{ url('product/' .$products->id) }}" method="post" enctype="multipart/form-data">
                      {!! csrf_field() !!}
                      @method("PATCH")
                        <input type="hidden" name="id" id="id" value="{{$products->id}}" id="id" />
                        <div class="row g-0">
                          <div class="col-lg-12">
                            <div class="p-5">

                                <div class="row">
                                  <div class="col-md-6 mb-4 pb-2">
                                    <div class="form-outline">
                                      <label class="form-label" for="form3Examplev2">Name</label> 
                                      <input type="text" name="Name" id="Name" value="{{$products->Name}}" class="form-control form-control-lg" />
                                    </div>
                                  </div>

                                  <div class="col-md-6 mb-4 pb-2">
                                    <div class="form-outline">
                                      <label class="form-label" for="form3Examplev3">Image</label>
                                      <input type="file" name="Image" id="Image" value="{{ asset('images/' . $products->Image) }}" required class="form-control form-control-lg">
                                    </div>
                                  </div>
                                </div>

                                <div class="row">
                                  <div class="col-md-6 mb-4 pb-2">
                                    <div class="form-outline">
                                      <label class="form-label" for="form3Examplev4">Description</label>
                                      <input type="text" name="Description" id="Description" value="{{$products->Description}}" class="form-control form-control-lg" />
                                    </div>
                                  </div>

                                  <div class="col-md-6 mb-4 pb-2">
                                    <div class="form-outline">
                                      <label class="form-label" for="form3Examplev4">Unit Price</label>
                                      <input type="text" name="UnitPrice" id="UnitPrice" value="{{$products->UnitPrice}}" class="form-control form-control-lg" />
                                    </div>
                                  </div>
                                </div>

                                <div class="row">
                                  <div class="col-md-4 mb-4 pb-2">
                                    <div class="form-outline">
                                      <label class="form-label" for="form3Examplev4">Supplier</label>
                                      <select name="SupplierID" id="SupplierID" class="form-control">
                                          @foreach($suppliers as $supplier)
                                              <option value="{{ $supplier->id }}" {{ $products->SupplierID == $supplier->id ? 'selected' : '' }}>
                                                  {{ $supplier->Name }}
                                              </option>
                                          @endforeach
                                      </select>
                                    </div>
                                  </div>

                                  <div class="col-md-4 mb-4 pb-2">
                                    <div class="form-outline">
                                      <label class="form-label" for="form3Examplev4">Category</label>
                                      <select name="CategoryID" id="CategoryID" class="form-control">
                                          @foreach($categories as $category)
                                              <option value="{{ $category->id }}" {{ $products->CategoryID == $category->id ? 'selected' : '' }}>
                                                  {{ $category->Name }}
                                              </option>
                                          @endforeach
                                      </select>
                                    </div>
                                  </div>

                                  <div class="col-md-4 mb-4 pb-2">
                                    <div class="form-outline">
                                      <label class="form-label" for="form3Examplev4">Unit</label>
                                      <select name="UnitID" id="UnitID" class="form-control">
                                          @foreach($units as $unit)
                                              <option value="{{ $unit->id }}" {{ $products->UnitID == $unit->id ? 'selected' : '' }}>
                                                  {{ $unit->Name }}
                                              </option>
                                          @endforeach
                                      </select>
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