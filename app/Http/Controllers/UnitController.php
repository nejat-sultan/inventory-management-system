<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Unit;

class UnitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $units = Unit::paginate(10);
        return view('unit.index', ['units' => $units]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('unit.create');
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
        ]);
        
        $input = $request->all();
        Unit::create($input);
     
        session()->flash('message', 'Unit Added Successfully!');
        return redirect('unit');
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
        $unit = Unit::find($id);
        return view('unit.edit')->with('units', $unit);
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
        $unit = Unit::find($id);
        $input = $request->all();
        $unit->update($input);
        return redirect('unit')->with('flash_message', 'Unit Updated!'); 

        session()->flash('message', 'Unit Updated Successfully!');
        return redirect('unit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Unit::destroy($id);
      
        session()->flash('message', 'Unit Deleted Successfully!');
        return redirect('unit');
    }

    public function searchunit(Request $request)
    {
        $search = $request->search;
        $units = Unit::where(function($query) use ($search){
            $query->where('Name','like',"%$search%");
        })
        ->paginate(10);

        return view('unit.index', compact('units','search'));   
    }
}
