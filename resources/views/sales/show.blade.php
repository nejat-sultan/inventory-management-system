@extends('layouts.adminpanel')
@section('content')

    <div class="row"> 
        <div class="col-md-12 col-lg-12">
            <h3 class="mb-3" id="titles"> View Sales </h3>
            
                <div class="card">
                    
                    <div class="card-body"> 
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>InvoiceNo </th>
                                        <th>SalesDate</th>
                                        <th>Category</th>
                                        <th>Product</th>
                                        <th>Quantity </th>
                                        <th>Customer </th>
                                        <th>PaidStatus</th>
                                        <th>Amount</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($sales as $item)
                                    <tr>
                                        <td> {{ $loop->iteration }} </td>
                                        <td> {{ $item->InvoiceNo }} </td>
                                        <td> {{ $item->Date }} </td>
                                        <td> {{ $item->category->Name }} </td>
                                        <td> {{ $item->product->Name }} </td>
                                        <td> {{ $item->Quantity }} </td>
                                        <td> {{ $item->customer->Name }} </td>
                                        <td> {{ $item->PaidStatus }} </td>
                                        <td> {{ $item->Amount }} </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>

                            {{ $sales->links('pagination::bootstrap-4') }}
                        </div>
 
                    </div>
                </div>
          
        </div>
    </div>



@endsection

