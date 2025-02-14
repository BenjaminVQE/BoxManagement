<?php

namespace App\Http\Controllers;

use App\Models\Box;
use App\Models\Tenant;
use App\Models\Contract;
use Illuminate\Http\Request;

class ContractController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('contracts.index', [
            'contracts' => Contract::all()->where('user_id', auth()->id())
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $tenants = Tenant::all()->where('user_id', auth()->id());
        $boxes = Box::all()->where('user_id', auth()->id());
        return view('contracts.create', [
            'boxes' => $boxes,
            'tenants' => $tenants
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Contract $contract)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Contract $contract)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Contract $contract)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Contract $contract)
    {
        //
    }
}