<?php

namespace App\Http\Controllers;

use App\Models\Tenant;
use Illuminate\Http\Request;

class TenantController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('tenants.index', [
            'tenants' => Tenant::all()->where('user_id', auth()->id())
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('tenants.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $tenant = new Tenant();
        $tenant->lastName = $request->get('lastName');
        $tenant->firstName = $request->get('firstName');
        $tenant->phoneNumber = $request->get('phoneNumber');
        $tenant->email = $request->get('email');
        $tenant->address = $request->get('address');
        $tenant->bankingDetails = $request->get('bankingDetails');
        $tenant->address = $request->get('address');
        $tenant->user_id = auth()->id();

        $tenant->save();

        return redirect()->route('tenants.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Tenant $tenant)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tenant $tenants, $id)
    {
        $tenant = $tenants->find($id);

        $this->isUser($tenant);

        return view('tenants.edit', [
            'tenant' => $tenant
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Tenant $tenants)
    {
        $tenant = $tenants->find($request->id);

        $this->isUser($tenant);

        $tenant->lastName = $request->get('lastName');
        $tenant->firstName = $request->get('firstName');
        $tenant->phoneNumber = $request->get('phoneNumber');
        $tenant->email = $request->get('email');
        $tenant->address = $request->get('address');
        $tenant->bankingDetails = $request->get('bankingDetails');
        $tenant->address = $request->get('address');

        $tenant->save();

        return redirect()->route('tenants.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tenant $tenants, $id)
    {
        $tenant = $tenants->findOrFail($id);

        $this->isUser($tenant);

        $tenant->delete();

        return redirect()->route('tenants.index');
    }
}
