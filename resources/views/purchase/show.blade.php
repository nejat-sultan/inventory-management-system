@extends('layouts.adminpanel')
@section('content')

    <div class="row"> 
        <div class="col-md-12 col-lg-12">
            <h3 class="mb-3" id="titles"> View Purchases </h3>
            
                <div class="card">
                    
                    <div class="card-body"> 
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
                                @foreach($purchases as $item)
                                    <tr>
                                        <td> {{ $loop->iteration }} </td>
                                        <td> {{ $item->PurchaseNo }} </td>
                                        <td> {{ $item->PurchaseDate }} </td>
                                        <td> {{ $item->supplier->Name }} </td>
                                        <td> {{ $item->category->Name }} </td>
                                        <td> {{ $item->product->Name }} </td>
                                        <td> {{ $item->product->UnitPrice }} </td>
                                        <td> {{ $item->Discount }} </td>
                                        <td> {{ $item->Quantity }} </td>
                                        <td> {{ $item->TotalPrice }} </td>
       
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>

                            {{ $purchases->links('pagination::bootstrap-4') }}

                        </div>
 
                    </div>
                </div>
          
        </div>
    </div>



@endsection

