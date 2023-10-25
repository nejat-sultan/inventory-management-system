@extends('layouts.adminpanel')
@section('content')

    <div class="row"> 
        <div class="col-md-12 col-lg-12">
            <h3 class="mb-3" id="titles"> View Products </h3>
            
                <div class="card">
                    <div class="card-body">
                        
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Image </th>
                                        <th>Name</th>
                                        <th>Description</th>
                                        <th>Category </th>
                                        <th>Supplier</th>
                                        <th>Barcode</th>
                                        <th>Unit</th>
                                        <th>Unit Price</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($products as $item)
                                    <tr>
                                        <td> {{ $loop->iteration }} </td>
                                        <td>
                                            <img src="{{ asset('images/' . $item->Image) }}" width="50" height="50" class="img img-responsive" />
                                        </td>
                                        <td> {{ $item->Name }} </td>
                                        <td> {{ $item->Description }} </td>
                                        <td> {{ $item->category->Name }} </td>
                                        <td> {{ $item->supplier->Name }} </td>
                                        <td> {!! DNS1D::getBarcodeHtml("$item->Barcode", 'PHARMA',2,50) !!} 
                                        p - {{ $item->Barcode }}
                                        </td>
                                        <td> {{ $item->unit->Name }} </td>
                                        <td> {{ $item->UnitPrice }} </td>
       
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>

                            {{ $products->links('pagination::bootstrap-4') }}
                        </div>
 
                    </div>
                </div>
          
        </div>
    </div>



@endsection

