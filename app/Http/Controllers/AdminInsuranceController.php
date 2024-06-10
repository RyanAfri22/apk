<?php

namespace App\Http\Controllers;

use App\Models\Insurance;
use Illuminate\Http\Request;

class AdminInsuranceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Insurance::all();
        return view('admin.insurance.assurance', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.insurance.add_insurance');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Insurance::create([
            'name' => $request->name,
            'cost' => $request->cost,
        ]);

        return redirect('/asuransi');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
