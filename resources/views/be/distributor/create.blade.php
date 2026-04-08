@extends('be.layout.master')

@section('sidebar')

@include('be.layout.sidebar')

@endsection

@section('navbar')

@include('be.layout.navbar')

@endsection

@section('content')
<div class="col-lg-6">
    <div class="card">
        <div class="card-header">Tambah Distributor Baru</div>
        <div class="card-body">
            <form action="{{ route('distributors.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label>Nama Distributor</label>
                    <input type="text" name="nama_distributor" 
                           class="form-control @error('nama_distributor') is-invalid @enderror" 
                           required>
                    @error('nama_distributor')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label>Telepon</label>
                    <input type="text" name="telepon" 
                           class="form-control @error('telepon') is-invalid @enderror" 
                           required>
                    @error('telepon')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label>Alamat</label>
                    <textarea name="alamat" class="form-control @error('alamat') is-invalid @enderror" 
                              rows="3" required></textarea>
                    @error('alamat')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label>Email (Opsional)</label>
                    <input type="email" name="email" 
                           class="form-control @error('email') is-invalid @enderror">
                    @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
        </div>
    </div>
</div>
@endsection