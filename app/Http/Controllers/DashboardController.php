<?php

namespace App\Http\Controllers;
use App\Models\Supplier;
use App\Models\Category;
use App\Models\Customer;
use App\Models\Purchase;
use App\Models\Invoice;
use App\Models\Product;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function dashboard()
    {
        $suppliers = Supplier::count(); 
        $categories = Category::count(); 
        $customers = Customer::count();  
        $purchase = Purchase::count(); 
        $sales = Invoice::count(); 
        $purchases = Purchase::orderBy('id', 'desc')->take(10)->get();  
        $sale = Invoice::orderBy('id', 'desc')->take(10)->get();  
        $product = Product::orderBy('id', 'desc')->where('Stock', '!=', 0)->take(10)->get();

        $lowStockProducts = Product::where('Stock', '<', 5)->get();
   
        return view('admin.dashboard', compact('suppliers','categories','customers','purchases','purchase','sales','sale','product','lowStockProducts'));
    }
    
     public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        //
    }
}
