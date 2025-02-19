<?php

namespace App\Http\Controllers;

use App\Models\Bill;

class TaxController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $bills = Bill::all()->where('user_id', auth()->id())->whereNotNull('payment_date');

        $totalAmount = $bills->sum('payment_total');

        if ($totalAmount < 15000) {
            $amountTaxes = $totalAmount * 0.7;
            $case = '4BE';
        } else {
            $amountTaxes = $totalAmount;
            $case = '4BA';
        }

        return view('tax.index', [
            'bills' => $bills,
            'totalAmount' => $totalAmount,
            'amountTaxes' => $amountTaxes,
            'case' => $case
        ]);
    }
}
