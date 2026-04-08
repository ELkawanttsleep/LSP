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
        <div class="card-header">Edit Jenis Pengiriman</div>
        <div class="card-body">
            <form action="{{ route('jenis_pengirimans.update', $jenisPengiriman->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                
                <div class="form-group">
                    <label>Jenis Kirim</label>
                    <select name="jenis_kirim" class="form-control" required>
                        @foreach(App\Models\JenisPengiriman::jenis_kirim as $jenis)
                        <option value="{{ $jenis }}" {{ $jenis == $jenisPengiriman->jenis_kirim ? 'selected' : '' }}>
                            {{ ucwords($jenis) }}
                        </option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label>Nama Ekspedisi</label>
                    <input type="text" name="nama_ekspedisi" class="form-control" 
                        value="{{ $jenisPengiriman->nama_ekspedisi }}" required>
                </div>

                <div class="form-group">
                    <label>Biaya</label>
                    <input type="number" name="biaya" class="form-control" 
                        value="{{ $jenisPengiriman->biaya }}" min="0" required>
                </div>

                <div class="form-group">
                    <label>Logo Saat Ini</label>
                    @if($jenisPengiriman->logo_ekspedisi)
                    <img src="{{ asset('storage/'.$jenisPengiriman->logo_ekspedisi) }}" width="100" class="d-block mb-2">
                    @endif
                    <input type="file" name="logo_ekspedisi" class="form-control">
                </div>

                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
</div>
@endsection