@extends('layouts.adminpanel')
@section('content')

    <div class="row"> 
        <div class="col-md-12 col-lg-12">
            <h3 class="mb-3" id="titles"> View Stocks </h3>
            
                <div class="card">
                    
                    <div class="card-body"> 
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Product</th>
                                        <th>Supplier</th>
                                        <th>Category</th>
                                        <th>Stock Quantity</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($stocks as $item)
                                    <tr>
                                        <td> {{ $loop->iteration }} </td>
                                        <td> {{ $item->Name }} </td>
                                        <td> {{ $item->supplier->Name }} </td>
                                        <td> {{ $item->category->Name }} </td>
                                        <td> {{ $item->Stock }} </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>

                            {{ $stocks->links('pagination::bootstrap-4') }}
                        </div>
 
                    </div>
                </div>
          
        </div>
    </div>



@endsection

