<?php

namespace App\Http\Controllers;

use Illuminate\Http\Response;
use Illuminate\Http\Request;
use Illuminate\View\View;

use App\Models\Supplier;


class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(): View
    {
        $suppliers = Supplier::paginate(10);
        return view('supplier.index', ['suppliers' => $suppliers]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('supplier.create');
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
            'Phoneno'=> 'required',
            'Email'=> 'required|email|unique:suppliers',
            'Address'=> 'required',
        ]);

        $input = $request->all();
        Supplier::create($input);
       
        session()->flash('message', 'Supplier Added Successfully!');
        return redirect('supplier');
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
        $supplier = Supplier::find($id);
        return view('supplier.edit')->with('suppliers', $supplier);
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
        $supplier = Supplier::find($id);
        $input = $request->all();
        $supplier->update($input);
    
        session()->flash('message', 'Supplier Updated Successfully!');
        return redirect('supplier');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Supplier::destroy($id);
      
        session()->flash('message', 'Supplier Deleted Successfully!');
        return redirect('supplier');
    }

    public function searchsupplier(Request $request)
    {
        $search = $request->search;
        $suppliers = Supplier::where(function($query) use ($search){
            $query->where('Name','like',"%$search%");
        })
        ->paginate(10);

        return view('supplier.index', compact('suppliers','search'));   
    }
}
