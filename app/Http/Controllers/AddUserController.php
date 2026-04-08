<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AddUserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::latest()->paginate(5);
        $totalUsers = User::Count();  


        return view('be.adduser.index', [
            'title' => 'Admin',
            'users' => $users,
            'totalUsers' => $totalUsers
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view ('be.adduser.create', [
            'title' => 'Adduser as Admin',
            'jabatanOptions' => ['admin', 'apoteker', 'karyawan', 'kasir', 'pemilik']
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
        'name' => 'required|max:255',
        'email' => 'required|email|unique:users,email',
        'password' => 'required|min:8',
        'jabatan' => 'required|in:admin,apoteker,karyawan,kasir,pemilik'
        ]);
    
        $validatedData['password'] = bcrypt($validatedData['password']);

        User::create($validatedData);

        return redirect()->route('adduser.index')->with('success', 'User baru berhasil ditambahkan!');
    
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
    public function edit(string $id)
    {
        $user = User::findorFail($id);

        return view('be.adduser.edit', [
            'title' => 'Edit User',
            'user' => $user,
            'jabatanOptions' => ['admin', 'apoteker', 'karyawan', 'kasir', 'pemilik']
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = User::findorFail($id);

        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|unique:users,email,'.$user->id,
            'password' => 'nullable|min:8',
            'jabatan' => 'required|in:admin,apoteker,karyawan,kasir,pemilik'
    ]);

    // Update password hanya jika diisi
    if ($request->filled('password')) {
        $validatedData['password'] = bcrypt($request->password);
    } else {
        unset($validatedData['password']);
    }

    $user->update($validatedData);

    return redirect()->route('adduser.index')
        ->with('success', 'Data user berhasil diperbarui!');
}
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::findorFail($id);
        $user->delete();

        return redirect()->route('adduser.index')
        ->with('success', 'User berhasil dihapus!');
    }
}
