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
        <div class="card-header">Edit Metode Pembayaran</div>
        <div class="card-body">
            <form action="{{ route('payment_methods.update', $PaymentMethod->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                
                <div class="form-group">
                    <label>Nama Metode</label>
                    <input type="text" name="metode_pembayaran" class="form-control" value="{{ $PaymentMethod->metode_pembayaran }}" required>
                </div>

                <div class="form-group">
                    <label>Tempat Bayar</label>
                    <input type="text" name="tempat_bayar" class="form-control" value="{{ $PaymentMethod->tempat_bayar }}" required>
                </div>

                <div class="form-group">
                    <label>Nomor Rekening</label>
                    <input type="text" name="no_rekening" class="form-control" value="{{ $PaymentMethod->no_rekening }}" required>
                </div>

                <div class="form-group">
                    <label>Logo Saat Ini</label>
                    @if($PaymentMethod->url_logo)
                    <img src="{{ asset('storage/'.$PaymentMethod->url_logo) }}" width="100" class="d-block mb-2">
                    @endif
                    <input type="file" name="url_logo" class="form-control">
                </div>

                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
</div>
@endsection