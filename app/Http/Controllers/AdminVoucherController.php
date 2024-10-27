<?php

namespace App\Http\Controllers;

// app/Http/Controllers/AdminVoucherController.php
use App\Models\Voucher;
use Illuminate\Http\Request;

class AdminVoucherController extends Controller
{
    public function create()
    {
        return view('admin.generatetoken');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'expired_date' => 'required|date',
            'discount' => 'required|numeric',
        ]);

        $token = Str::random(10); // Generate random token

        Voucher::create([
            'name' => $request->name,
            'expired_date' => $request->expired_date,
            'discount' => $request->discount,
            'token' => $token,
        ]);

        // Tambahkan notifikasi atau redirect setelah voucher berhasil dibuat
        return redirect()->route('admin.voucher.index')->with('success', 'Voucher berhasil dibuat');
    }
}
