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
        <div class="card-header">Tambah Metode Pembayaran</div>
        <div class="card-body">
            <form action="{{ route('payment_methods.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label>Metode Bayar</label>
                    <input type="text" name="metode_pembayaran" class="form-control" required>
                </div>
                
                <div class="form-group">
                    <label>Tempat Bayar</label>
                    <input type="text" name="tempat_bayar" class="form-control" required>
                </div>

                <div class="form-group">
                    <label>Nomor Rekening/telepon</label>
                    <input type="text" name="no_rekening" class="form-control" required>
                </div>

                <div class="form-group">
                    <label>Logo</label>
                    <input type="file" name="url_logo" class="form-control">
                </div>

                <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
        </div>
    </div>
</div>
@endsection