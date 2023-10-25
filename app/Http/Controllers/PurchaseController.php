<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Purchase;
use App\Models\Category;
use App\Models\Supplier;
use App\Models\Product;
use App\Models\Stock;

use Illuminate\Support\Facades\DB;

class PurchaseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $purchases = Purchase::paginate(10);
        return view('purchase.index', ['purchases' => $purchases]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $categories = Category::pluck('Name', 'id');
        $suppliers = Supplier::pluck('Name', 'id');
        $products = Product::pluck('Name', 'id');
        return view('purchase.create', compact('categories','suppliers','products'));

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
            'PurchaseNo'=> 'required|unique:purchases',
            'PurchaseDate'=> 'required',
            'SupplierID'=> 'required',
            'CategoryID'=> 'required',
            'ProductID'=> 'required',
            'Discount'=> 'required',
            'Quantity'=> 'required'
        ]);

        $purchase = new purchase();
        $product = new product();

        $input['PurchaseNo'] = $request->input('PurchaseNo');
        $input['PurchaseDate'] = $request->input('PurchaseDate');
        $input['SupplierID'] = $request->input('SupplierID');
        $input['CategoryID'] = $request->input('CategoryID');
        $input['ProductID'] = $request->input('ProductID');
        // $input['UnitPrice'] = $request->input('UnitPrice');
        $product->UnitPrice = $request->get('UnitPrice');
        $input['Discount'] = $request->input('Discount');
        $input['Quantity'] = $request->input('Quantity');

        // $discount = $input['UnitPrice'] - $input['Discount'];
        // $Total = $discount * $input['Quantity'];
        // $input['TotalPrice'] = $Total;

        $prod = Product::find($input['ProductID']);
        $discount = $prod->UnitPrice - $input['Discount'];
        $Total = $discount * $input['Quantity'];
        $input['TotalPrice'] = $Total;


        // $product = Purchase::select('ProductID', DB::raw('SUM(Quantity) as Stock'))
        //     ->groupBy('ProductID')
        //     ->where('ProductID', $input['ProductID'])
        //     ->first();

        // if ($product) {
        //     $stockValue = $product->Stock;
        //     $input['Stock'] = $stockValue + $input['Quantity'];
        // } else {
        //     $input['Stock'] = $input['Quantity'];
        // }

        $purchase = Purchase::create($input);
        $purchase->save();
        
        
        // Update logic for product
        $product = Product::find($purchase->ProductID);

        if ($product) {
            $stockV = $product->Stock;
            $product->Stock = $stockV + $input['Quantity'];
        } else {
            $product->Stock = $input['Quantity'];
        }

        $product->save();
      
        session()->flash('message', 'Purchase Added Successfully!');
        return redirect('purchase');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $purchases = Purchase::paginate(10);
        return view('purchase.show', ['purchases' => $purchases]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       //
        
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Purchase::destroy($id);
   
        session()->flash('message', 'Purchase Deleted Successfully!');
        return redirect('purchase');
    }

    public function searchpurchase(Request $request)
    {
        $search = $request->search;
        $purchases = Purchase::where(function($query) use ($search){
            $query->where('PurchaseNo','like',"%$search%");
        })
        ->paginate(10);

        return view('purchase.index', compact('purchases','search'));   
    }

    public function purchasereport(Request $request)
    {
        // $specificDate = $request->input('search_date');
        // $reports = Invoice::where('date', $specificDate)->get();

        $startDate = $request->input('start_date');
        $endDate = $request->input('end_date');

        $reports = Purchase::whereBetween('PurchaseDate', [$startDate, $endDate])->paginate(10);


        return view('purchase.report', ['reports' => $reports]);
    }
    
}
