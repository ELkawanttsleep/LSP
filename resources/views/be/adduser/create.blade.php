@extends('be.layout.master')
@section('sidebar')
    @include('be.layout.sidebar')
@endsection
@section('navbar') 
    @include('be.layout.navbar')
@section('content')
<div class="container">
    <h1 class="mb-4">Tambah User Baru</h1>
    <form action="{{ route('adduser.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Nama Lengkap</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" required>
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control @error('password') is-invalid @enderror" 
                   id="password" name="password" required>
            @error('password')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="jabatan" class="form-label">Jabatan</label>
            <select class="form-select" id="jabatan" name="jabatan" required>
                <option value="">Pilih Jabatan</option>
                @foreach($jabatanOptions as $option)
                    <option value="{{ $option }}">{{ ucfirst($option) }}</option>
                @endforeach
            </select>
        </div>
        <div class="d-flex gap-2 mt-4">
            <a href="{{ route('adduser.index') }}" class="btn btn-secondary mr-2">Kembali</a>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
    </form>
</div>
</div>
@endsection