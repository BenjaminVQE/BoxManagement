<?php

namespace App\Http\Controllers;

use App\Models\Box;
use App\Models\Tenant;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

class BoxController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('boxes.index', [
            'boxes' => Box::all()->where('user_id', auth()->id())
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('boxes.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $box = new Box();
        $box->name = $request->get('name');
        $box->price = $request->get('price');
        $box->surface = $request->get('surface');
        $box->address = $request->get('address');
        $box->description = $request->get('description');
        $box->user_id = auth()->id();

        $box->save();

        return redirect()->route('boxes.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Box $box)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Box $boxes, $id)
    {
        $box = $boxes->find($id);

        $this->isUser($box);

        return view('boxes.edit', [
            'box' => $box
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $box = Box::find($request->id);

        $this->isUser($box);

        $box->name = $request->get('name');
        $box->price = $request->get('price');
        $box->surface = $request->get('surface');
        $box->address = $request->get('address');
        $box->description = $request->get('description');

        $box->save();

        return redirect()->route('boxes.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $box = Box::findOrFail($id);

        $this->isUser($box);

        $box->delete();

        return redirect()->route('boxes.index');
    }
}
