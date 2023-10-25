@extends('layouts.adminpanel')
@section('content')

    <div class="row"> 
        <div class="col-md-12 col-lg-12">
            
                <div class="card">
                    <div class="card-body"> 

                    <h3 class="mb-4" id="titles"> Daily Purchase Report </h3>

                    <div class="row justify-content-center align-items-center">
                        <form class="form-inline my-2 my-lg-3" action="{{ url('purchasereport') }}" method="GET">
                            <div class="col-md-6">
                                <div class="input-group mb-3">
                                    <label for="start_date">Start Date:</label>
                                    <input type="date" class="form-control" name="start_date" id="start_date" aria-label="Search 1">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="input-group mb-3">
                                    <input type="date" class="form-control" name="end_date" id="end_date" aria-label="Search 2">
                                    <button class="btn btn-dark my-2 my-sm-0" type="submit"> 
                                        <i class="fa fa-search" aria-hidden="true"></i>
                                    </button>
                                </div>
                                
                            </div>
                        </form>
                    </div>

                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>PurchaseNo </th>
                                        <th>PurchaseDate</th>
                                        <th>Supplier </th>
                                        <th>Category</th>
                                        <th>Product</th>
                                        <th>UnitPrice </th>
                                        <th>Discount </th>
                                        <th>Quantity</th>
                                        <th>TotalPrice</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($reports as $report)
                                    <tr>
                                        <td> {{ $report->iteration }} </td>
                                        <td> {{ $report->PurchaseNo }} </td>
                                        <td> {{ $report->PurchaseDate }} </td>
                                        <td> {{ $report->supplier->Name }} </td>
                                        <td> {{ $report->category->Name }} </td>
                                        <td> {{ $report->product->Name }} </td>
                                        <td> {{ $report->product->UnitPrice }} </td>
                                        <td> {{ $report->Discount }} </td>
                                        <td> {{ $report->Quantity }} </td>
                                        <td> {{ $report->TotalPrice }} </td>
       
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>

                            {{ $reports->links('pagination::bootstrap-4') }}

                        </div>
 
                    </div>
                </div>
          
        </div>
    </div>



@endsection

