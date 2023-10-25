<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Purchase;
use App\Models\Category;
use App\Models\Customer;
use App\Models\Product;
use App\Models\Invoice;

use Illuminate\Support\Facades\DB;

class SalesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sales = Invoice::paginate(10);
        return view('sales.index', ['sales' => $sales]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::pluck('Name', 'id');
        $customers = Customer::pluck('Name', 'id');
        $products = Product::pluck('Name', 'id');
        return view('sales.create', compact('categories','customers','products'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'InvoiceNo'=> 'required|unique:invoices',
            'Date'=> 'required',
            'CategoryID'=> 'required',
            'ProductID'=> 'required',
            'Quantity'=> 'required',
            'CustomerID'=> 'required',
            'Amount'=> 'required'
        ]);

    
        $product = Product::find($request->input('ProductID'));
        if (!$product || $product->Stock < $request->input('Quantity')) {
            
            session()->flash('message', 'Insufficient stock!');
            return redirect('sales/create');
        }
 
        $input = $request->only(['InvoiceNo', 'Date', 'CategoryID', 'ProductID', 'Quantity', 'CustomerID', 'Amount']);
        if($input['Amount'] >= ($product->UnitPrice * $input['Quantity'])) {
            $input['PaidStatus'] = 'Fully Paid';
        }
        else {
            $input['PaidStatus'] = 'Not Fully Paid';
        }


        $sales = Invoice::create($input);

        // Decrement the stock
        $product->decrement('Stock', $request->input('Quantity'));

        session()->flash('message', 'Sales Added Successfully!');
        return redirect('sales');


        // $sales = new invoice();
        // $product = new product();
       
        // $input['InvoiceNo'] = $request->input('InvoiceNo');
        // $input['Date'] = $request->input('Date');
        // $input['CategoryID'] = $request->input('CategoryID');
        // $input['ProductID'] = $request->input('ProductID');
        // $input['Quantity'] = $request->input('Quantity');
        // $input['CustomerID'] = $request->input('CustomerID');
        // $input['PaidStatus'] = $request->input('PaidStatus');
        // $input['Amount'] = $request->input('Amount');

        // $sales = Invoice::create($input);
        // $sales->save();

        // // Update logic for product
        // $product = Product::find($sales->ProductID);
        // $product->Stock = $product->Stock - $input['Quantity'];
        // $product->save();

        // return redirect('sales')->with('flash_message', 'Sales Added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $sales = Invoice::paginate(10);
        return view('sales.show', ['sales' => $sales]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $sales = Invoice::find($id);
        return view('sales.edit')->with('sales', $sales);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $sales = Invoice::find($id);
        $input = $request->all();
        $sales->update($input);
     
        session()->flash('message', 'Payment Status Updated Successfully!');
        return redirect('sales');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Invoice::destroy($id);
        
        session()->flash('message', 'Sales Deleted Successfully!');
        return redirect('sales');
    }

    public function searchsales(Request $request)
    {
        $search = $request->search;
        $sales = Invoice::where(function($query) use ($search){
            $query->where('InvoiceNo','like',"%$search%");
        })
        ->paginate(10);

        return view('sales.index', compact('sales','search'));   
    }

   
    public function salesreport(Request $request)
    {
        $startDate = $request->input('start_date');
        $endDate = $request->input('end_date');

        $reports = Invoice::whereBetween('Date', [$startDate, $endDate])->paginate(10);


        return view('sales.report', ['reports' => $reports]);
    }

}
