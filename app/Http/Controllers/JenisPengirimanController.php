<?php

namespace App\Http\Controllers;

use App\Models\JenisPengiriman;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class JenisPengirimanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $jenis_pengiriman = JenisPengiriman::latest()->paginate(5);
        $totalJenisPengiriman = JenisPengiriman::count();
        $title = 'Jenis Pengiriman';
        return view('be.jenis_pengiriman.index', compact('jenis_pengiriman', 'totalJenisPengiriman', 'title'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = 'Tambah Jenis Pengiriman';
        return view('be.jenis_pengiriman.create', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'jenis_kirim' => 'required|string|max:50',
            'nama_ekspedisi' => 'required|string',
            'biaya' => 'required|numeric|min:0',
            'logo_ekspedisi' => 'nullable|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        if($request->hasFile('logo_ekspedisi')) {
            $data['logo_ekspedisi'] = $request->file('logo_ekspedisi')
            ->store('ekspedisi-logos', 'public');
        }

        JenisPengiriman::create($data);

        return redirect()->route('jenis_pengirimans.index')
        ->with('success', 'Jenis pengiriman berhasil ditambahkan!');
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
    public function edit(JenisPengiriman $jenisPengiriman)
    {
        $title = 'Edit Jenis Pengiriman';
        return view ('be.jenis_pengiriman.edit', compact('jenisPengiriman','title'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, JenisPengiriman $jenisPengiriman)
    {
        $data = $request->validate([
        'jenis_kirim' => 'required|in:'.implode(',', JenisPengiriman::jenis_kirim),
        'nama_ekspedisi' => 'required|string|max:50',
        'biaya' => 'required|numeric|min:0',
        'logo_ekspedisi' => 'nullable|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        if($request->hasFile('logo_ekspedisi')) {
            Storage::delete('public/'.$jenisPengiriman->logo_ekspedisi);
            $data['logo_ekspedisi'] = $request->file('logo_ekspedisi')
                ->store('ekspedisi-logos', 'public');
        }

        $jenisPengiriman->update($data);

        return redirect()->route('jenis_pengirimans.index')
        ->with('success', 'Data berhasil diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(JenisPengiriman $jenisPengiriman)
    {
        if($jenisPengiriman->logo_ekspedisi) {
            Storage::delete('public/'.$jenisPengiriman->logo_ekspedisi);
        }
        $jenisPengiriman->delete();
        
        return back()->with('success', 'Data terhapus!');
    }
}
