@extends('layouts.adminpanel')
@section('content')

    <div class="row"> 
        <div class="col-md-12 col-lg-12">
            <h3 class="mb-3" id="titles"> Manage Products </h3>
            
                <div class="card">
                    <div class="card-header">
                        <div class="col-md-8 col-lg-9">
                            <form class="form-inline my-2 my-lg-0" method="get" action="/searchproduct">
                                <input class="form-control mr-2" name="search" placeholder="Search" value="{{ isset($search) ? $search : ''}}"/>
                                <button class="btn btn-outline-dark my-2 my-sm-0" type="submit"> 
                                    <i class="fa fa-search" aria-hidden="true"></i>
                                </button>  
                            </form>
                        </div>
                        <div class="col-md-4 col-lg-3">
                            <a href="{{ url('/product/create') }}" class="btn btn-success btn-sm" id="addbutton" title="Add New Product">
                                <i class="fa fa-plus" aria-hidden="true"></i> Add New Product
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Image </th>
                                        <th>Barcode</th>
                                        <th>Name</th>
                                        <th>Description</th>
                                        <th>Unit Price</th>
                                        <th>Supplier</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($products as $item)
                                    <tr>
                                        <td> {{ $loop->iteration }} </td>
                                        <td>
                                            <img src="{{ asset('images/' . $item->Image) }}" width="50" height="50" class="img img-responsive" />
                                        </td>
                                        <td> {!! DNS1D::getBarcodeHtml("$item->Barcode", 'PHARMA',2,50) !!} 
                                        p - {{ $item->Barcode }}
                                        </td>
                                        <td> {{ $item->Name }} </td>
                                        <td> {{ $item->Description }} </td>
                                        <td> {{ $item->UnitPrice }} </td>
                                        <td> {{ $item->supplier->Name }} </td>
       
                                        <td>
                                            <a href="{{ url('/product/' . $item->id . '/edit') }}" title="Edit Product"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>
                                            
                                            <form method="POST" action="{{ url('/product' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn btn-danger btn-sm" title="Delete Product" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                                            </form>
                                        </td>
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

