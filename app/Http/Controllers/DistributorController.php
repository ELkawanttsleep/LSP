<?php

namespace App\Http\Controllers;

use App\Models\Distributor;
use Illuminate\Http\Request;

class DistributorController extends Controller
{
    public function index()
    {
        $distributors = Distributor::latest()->paginate(10);
        $title = 'Daftar Distributor';
        return view('be.distributor.index', compact('distributors', 'title'));
    }

    public function create()
    {
        $title = 'Tambah Distributor';
        return view('be.distributor.create', compact('title'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nama_distributor' => 'required|string|max:50',
            'telepon' => 'required|string|max:15',
            'alamat' => 'required|string',
            'email' => 'nullable|email'
        ]);

        Distributor::create($data);

        return redirect()->route('distributors.index')
            ->with('success', 'Distributor baru berhasil ditambahkan!');
    }

    public function show(Distributor $distributor)
    {
        
    }

    public function edit(Distributor $distributor)
    {
        $title = 'Edit Distributor';
        return view('be.distributor.edit', compact('distributor', 'title'));
    }

    public function update(Request $request, Distributor $distributor)
    {
        $data = $request->validate([
            'nama_distributor' => 'required|string|max:50',
            'telepon' => 'required|string|max:15',
            'alamat' => 'required|string',
            'email' => 'nullable|email'
        ]);

        $distributor->update($data);

        return redirect()->route('distributors.index')
            ->with('success', 'Data distributor berhasil diupdate!');
    }

    public function destroy(Distributor $distributor)
    {
        $distributor->delete();
        return back()->with('success', 'Distributor dihapus!');
    }
}