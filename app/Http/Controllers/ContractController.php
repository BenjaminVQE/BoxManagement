<?php

namespace App\Http\Controllers;

use App\Models\Box;
use App\Models\Tenant;
use App\Models\Contract;
use App\Models\ContractTemplate;
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
        $contractTemplates = ContractTemplate::all()->where('user_id', auth()->id());
        $tenants = Tenant::all()->where('user_id', auth()->id());
        $boxes = Box::all()->where('user_id', auth()->id());
        return view('contracts.create', [
            'boxes' => $boxes,
            'tenants' => $tenants,
            'contractTemplates' => $contractTemplates,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $contract = new Contract();
        $contract->name = $request->get('name');
        $contract->date_start = $request->get('dateStart');
        $contract->date_end = $request->get('dateEnd');
        $contract->monthly_price = $request->get('monthlyPrice');
        $contract->content = $request->get('content');
        $contract->tenant_id = $request->get('tenant');
        $contract->box_id = $request->get('box');
        $contract->user_id = auth()->id();

        $contract->save();

        return redirect()->route('contracts.index');
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
