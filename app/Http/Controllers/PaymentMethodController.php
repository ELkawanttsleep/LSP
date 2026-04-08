<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use App\Models\PaymentMethod;
use Illuminate\Http\Request;

class PaymentMethodController extends Controller
{
    public function index()
    {
        $paymentMethods = PaymentMethod::latest()->paginate(5);
        $totalPaymentMethods = PaymentMethod::count();
        $title = 'Metode Bayar';
        
        return view('be.payment_method.index', compact('paymentMethods', 'totalPaymentMethods', 'title'));
    }

    public function create()
    {
        $title = 'Tambah Metode Bayar';
        return view('be.payment_method.create', compact('title'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'metode_pembayaran' => 'required|string|max:30',
            'tempat_bayar' => 'required|string|max:30',
            'no_rekening' => 'required|string|max:25',
            'url_logo' => 'nullable|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        if($request->hasFile('url_logo')) {
            $data['url_logo'] = $request->file('url_logo')->store('payment-logos', 'public');
        }

        PaymentMethod::create($data);

        return redirect()->route('payment_methods.index')->with('success', 'Metode berhasil ditambahkan!');
    }

    public function edit(PaymentMethod $PaymentMethod)
    {
        $title = 'Ubah Metode Bayar';
        return view('be.payment_method.edit', compact('PaymentMethod', 'title'));
    }

    public function update(Request $request, PaymentMethod $PaymentMethod)
    {
        $data = $request->validate([
            'metode_pembayaran' => 'required|string|max:30',
            'tempat_bayar' => 'required|string|max:30',
            'no_rekening' => 'required|string|max:25',
            'url_logo' => 'nullable|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        if($request->hasFile('url_logo')) {
            Storage::delete('public/'.$PaymentMethod->url_logo);
            $data['url_logo'] = $request->file('url_logo')->store('payment-logos', 'public');
        }

        $PaymentMethod->update($data);

        return redirect()->route('payment_methods.index')->with('success', 'Metode berhasil diupdate!');
    }

    public function destroy(PaymentMethod $PaymentMethod)
    {
        if($PaymentMethod->url_logo) {
            Storage::delete('public/'.$PaymentMethod->url_logo);
        }
        
        $PaymentMethod->delete();
        
        return back()->with('success', 'Metode berhasil dihapus!');
    }
}