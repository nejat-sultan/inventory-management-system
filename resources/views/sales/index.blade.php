@extends('layouts.adminpanel')
@section('content')

    <div class="row"> 
        <div class="col-md-12 col-lg-12">
            <h3 class="mb-3" id="titles"> Manage Sales </h3>
            
                <div class="card">
                    <div class="card-header">
                        <div class="col-md-8 col-lg-9">
                            <form class="form-inline my-2 my-lg-0" method="get" action="/searchsales">
                                <input class="form-control mr-2" name="search" placeholder="Search" value="{{ isset($search) ? $search : ''}}"/>
                                <button class="btn btn-outline-dark my-2 my-sm-0" type="submit"> 
                                    <i class="fa fa-search" aria-hidden="true"></i>
                                </button>  
                            </form>
                        </div>
                        <div class="col-md-4 col-lg-3">
                            <a href="{{ url('/sales/create') }}" class="btn btn-success btn-sm" id="addbutton" title="Add New Sales">
                                <i class="fa fa-plus" aria-hidden="true"></i> Add New Sales
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>InvoiceNo </th>
                                        <th>Date</th>
                                        <th>Product</th>
                                        <th>Customer</th>
                                        <th>Quantity</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($sales as $item)
                                    <tr>
                                        <td> {{ $loop->iteration }} </td>
                                        <td> {{ $item->InvoiceNo }} </td>
                                        <td> {{ $item->Date }} </td>
                                        <td> {{ $item->product->Name }} </td>
                                        <td> {{ $item->customer->Name }} </td>
                                        <td> {{ $item->Quantity }} </td>
                                        <td class="text-center">
                                            <div class="badge badge-warning">{{ $item->PaidStatus }}</div>
                                        </td>
       
                                        <td>
                                            <a href="{{ url('/sales/' . $item->id . '/edit') }}" title="Edit Status"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit Status</button></a>
                                            
                                            <form method="POST" action="{{ url('/sales' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn btn-danger btn-sm" title="Delete Sales" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                                            </form>
                                        </td>
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

