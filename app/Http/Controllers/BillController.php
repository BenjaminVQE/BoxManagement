<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Bill;
use App\Models\Contract;
use Illuminate\Http\Request;

class BillController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $bills = Bill::all()->where('user_id', auth()->id())->whereNull('payment_date');

        return view('bills.index', [
            'bills' => $bills
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $currentDate = Carbon::now();
        $contracts = Contract::where('user_id', auth()->id())
            ->where('date_start', '<=', $currentDate)
            ->where('date_end', '>=', $currentDate)
            ->get();

        foreach ($contracts as $contract) {
            $startDate = Carbon::parse($contract->start_date);
            $periodNumber = round($startDate->diffInMonths($currentDate) + 1);

            $existingBill = Bill::where('contract_id', $contract->id)
                ->where('period_number', $periodNumber)
                ->first();

            if (!$existingBill) {

                $bill = new Bill();

                $bill->payment_total = $contract->monthly_price;
                $bill->period_number = $periodNumber;
                $bill->payment_date = null;
                $bill->contract_id = $contract->id;
                $bill->user_id = auth()->id();

                $bill->save();
            }
        }

        return redirect()->route('bills.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Bill $bill)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Bill $bill)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Bill $bill, $id)
    {
        $bill = Bill::find($request->id);

        $this->isUser($bill);

        $bill->payment_date = $request->payment_date;

        $bill->save();

        return redirect()->route('bills.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Bill $bill)
    {
        //
    }
}
