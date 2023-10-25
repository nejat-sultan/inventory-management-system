<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Product;
use App\Models\Category;
use App\Models\Supplier;
use App\Models\Unit;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::paginate(10);
        return view('product.index', ['products' => $products]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::pluck('Name', 'id');
        $suppliers = Supplier::pluck('Name', 'id');
        $units = Unit::pluck('Name', 'id');
        return view('product.create', compact('categories','suppliers','units'));
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
            'Name'=> 'required',
            'Image'=> 'required',
            'Description'=> 'required',
            'CategoryID'=> 'required',
            'SupplierID'=> 'required',
            'UnitID'=> 'required',
            'UnitPrice'=> 'required'
        ]);

        $input = $request->all();
        $fileName = time() . '.' . request()->Image->getClientOriginalExtension();
        request()->Image->move(public_path('images'), $fileName);
        $input['Image'] = $fileName;

        $barcode = mt_rand(1000000000, 9999999999);
        $input['Barcode'] = $barcode;
        if ($this->barcodeExists($barcode)){
            $barcode = mt_rand(1000000000, 9999999999);
        }

        Product::create($input);
 
        session()->flash('message', 'Product Added Successfully!');
        return redirect('product');
    }

    public function barcodeExists($barcode)
    {
        return Product::whereBarcode($barcode)->exists();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $products = Product::paginate(10);
        return view('product.show', ['products' => $products]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id): View
    {
        $products = Product::find($id);
        $categories = Category::all();
        $suppliers = Supplier::all();
        $units = Unit::all();
        return view('product.edit', compact('products','categories','suppliers','units'));
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
        $product = Product::find($id);
        if($product) {
        $input = $request->all();
        $fileName = time() . '.' . request()->Image->getClientOriginalExtension();
        request()->Image->move(public_path('images'), $fileName);
        $input['Image'] = $fileName;

        $product->update($input);
     
        session()->flash('message', 'Product Updated Successfully!');
        return redirect('product');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Product::destroy($id);

        session()->flash('message', 'Product Deleted Successfully!');
        return redirect('product');
    }

    public function searchproduct(Request $request)
    {
        $search = $request->search;
        $products = Product::where(function($query) use ($search){
            $query->where('Name','like',"%$search%");
        })
        ->paginate(10);

        return view('product.index', compact('products','search'));   
    }

    public function stockreport(Request $request)
    {
        $stocks = Product::paginate(10);
        return view('stock.stockreport', compact('stocks'));
    }
    
}
