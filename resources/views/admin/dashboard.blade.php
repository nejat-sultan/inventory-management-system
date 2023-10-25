@extends('layouts.adminpanel')
@section('content')


    <div class="app-page-title">
        <div class="page-title-wrapper">
            <div class="page-title-heading">
                <div class="page-title-icon">
                         <i class="fa fa-tachometer" aria-hidden="true"></i>
                    </i>
                </div>
                <div> Analytics Dashboard </div>
            </div>  
        </div>
    </div> 

    @foreach($lowStockProducts as $pr)
    <div class="alert alert-warning">
        Stock for <strong>{{ $pr->Name }}</strong> is running low! Only {{ $pr->Stock }} left.
    </div>
@endforeach

<script>
setInterval(function() {
    $.ajax({
        url: '/check-low-stock',  // Define a route that returns low-stock products as JSON
        method: 'GET',
        success: function(data) {
            // Clear old notifications and add new ones based on the returned data
        }
    });
}, 30000);  // Check every 30 seconds, adjust the interval as needed
</script>

    
    <div class="row">
        <div class="col-md-4 col-xl-4">
            <div class="card mb-3 widget-content bg-midnight-bloom">
                <div class="widget-content-wrapper text-white">
                    <div class="widget-content-left">
                        <div class="widget-heading">Total Suppliers</div>
                        <div class="widget-subheading">Total number of Suppliers</div>
                    </div>
                    <div class="widget-content-right">
                        <div class="widget-numbers text-white"><span>{{ $suppliers }}</span></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4 col-xl-4">
            <div class="card mb-3 widget-content bg-arielle-smile">
                <div class="widget-content-wrapper text-white">
                    <div class="widget-content-left">
                        <div class="widget-heading">Total Categories</div>
                        <div class="widget-subheading">Total number of categories</div>
                    </div>
                    <div class="widget-content-right">
                        <div class="widget-numbers text-white"><span>{{ $categories }}</span></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4 col-xl-4">
            <div class="card mb-3 widget-content bg-grow-early">
                <div class="widget-content-wrapper text-white">
                    <div class="widget-content-left">
                        <div class="widget-heading">Total Customers</div>
                        <div class="widget-subheading">Total number of Customers</div>
                    </div>
                    <div class="widget-content-right">
                        <div class="widget-numbers text-white"><span>{{ $customers }}</span></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="main-card mb-3 card">
                                    <div class="card-header">Latest Purchase </div>
                                    <div class="table-responsive">
                                        <table class="align-middle mb-0 table table-borderless table-striped table-hover">
                                            <thead>
                                            <tr>
                                                <th class="text-center">#</th>
                                                <th>Purchase No</th>
                                                <th class="text-center">Supplier</th>
                                                <th class="text-center">Purchase Date</th>
                                                <th class="text-center">Product</th>
                                                <th class="text-center">Total Price</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($purchases as $item)
                                            <tr>
                                                <td class="text-center text-muted">{{ $loop->iteration }}</td>
                                                <td class="text-center">{{ $item->PurchaseNo }}</td>
                                                <td class="text-center">{{ $item->supplier->Name }}</td>
                                                <td class="text-center">{{ $item->PurchaseDate }}</td>
                                                <td class="text-center">{{ $item->product->Name }}</td>
                                                <td class="text-center">
                                                    <div class="badge badge-warning">{{ $item->TotalPrice }}</div>
                                                </td>
                                               
                                            </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                    
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="main-card mb-3 card">
                                    <div class="card-header">Latest Sales </div>
                                    <div class="table-responsive">
                                        <table class="align-middle mb-0 table table-borderless table-striped table-hover">
                                            <thead>
                                            <tr>
                                                <th class="text-center">#</th>
                                                <th>Invoice No</th>
                                                <th class="text-center">Customer</th>
                                                <th class="text-center">Sales Date</th>
                                                <th class="text-center">Product</th>
                                                <th class="text-center">Amount</th>
                                                <th class="text-center">Paid Status</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($sale as $item)
                                            <tr>
                                                <td class="text-center text-muted">{{ $loop->iteration }}</td>
                                                <td class="text-center">{{ $item->InvoiceNo }}</td>
                                                <td class="text-center">{{ $item->customer->Name }}</td>
                                                <td class="text-center">{{ $item->Date }}</td>
                                                <td class="text-center">{{ $item->product->Name }}</td>
                                                <td class="text-center">{{ $item->Amount }}</td>
                                                <td class="text-center">
                                                    <div class="badge badge-warning">{{ $item->PaidStatus }}</div>
                                                </td>
                                               
                                            </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>

                        </div>

                        
                        <div class="row">
                            <div class="col-md-6 col-lg-6">
                                <div class="card mb-3 widget-content">
                                    <div class="widget-content-outer">
                                        <div class="widget-content-wrapper">
                                            <div class="widget-content-left">
                                                <div class="widget-heading">Total Purchases</div>
                                            </div>
                                            <div class="widget-content-right">
                                                <div class="widget-numbers text-success">{{ $purchase }}</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-6">
                                <div class="card mb-3 widget-content">
                                    <div class="widget-content-outer">
                                        <div class="widget-content-wrapper">
                                            <div class="widget-content-left">
                                                <div class="widget-heading">Total Sales</div>
                                            </div>
                                            <div class="widget-content-right">
                                                <div class="widget-numbers text-warning">{{ $sales }}</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        
                        <div class="row">
                            <div class="col-md-12">
                                <div class="main-card mb-3 card">
                                    <div class="card-header">Total Stocks </div>
                                    <div class="table-responsive">
                                        <table class="align-middle mb-0 table table-borderless table-striped table-hover">
                                            <thead>
                                            <tr>
                                                <th class="text-center">#</th>
                                                <th>Product</th>
                                                <!-- <th class="text-center">Supplier</th> -->
                                                <th class="text-center">Stock Quantity</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($product as $item)
                                            <tr>
                                                <td class="text-center text-muted">{{ $loop->iteration }}</td>
                                                <td class="text-center">{{ $item->Name }}</td>
                                                <td class="text-center">{{ $item->Stock }}</td>
                                                
                                            </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>


@endsection

