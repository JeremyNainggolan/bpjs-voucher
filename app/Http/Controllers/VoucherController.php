<?php

namespace App\Http\Controllers;

use App\Models\Voucher;
use Illuminate\Http\Request;

class VoucherController extends Controller
{
    public function index()
    {
        $vouchers = Voucher::all();
        return view('vouchers.index', compact('vouchers'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'code' => 'required|unique:vouchers',
            'amount' => 'required|numeric|min:0',
        ]);

        Voucher::create($validated);
        return redirect()->route('vouchers.index');
    }

    public function use(Voucher $voucher, Request $request)
    {
        if (!$voucher->is_used) {
            $voucher->update([
                'is_used' => true,
                'user_id' => auth()->id(),
                'used_at' => now(),
            ]);
        }
        return redirect()->back();
    }
}