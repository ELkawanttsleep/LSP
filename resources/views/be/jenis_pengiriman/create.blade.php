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
        <div class="card-header">Tambah Jenis Pengiriman</div>
        <div class="card-body">
            <form action="{{ route('jenis_pengirimans.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label>Jenis Kirim</label>
                    <select name="jenis_kirim" class="form-control" required>
                        @foreach(App\Models\JenisPengiriman::jenis_kirim as $jenis)
                        <option value="{{ $jenis }}">{{ ucwords($jenis) }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label>Nama Ekspedisi</label>
                    <input type="text" name="nama_ekspedisi" class="form-control" required>
                </div>

                <div class="form-group">
                    <label>Biaya</label>
                    <input type="number" name="biaya" class="form-control" min="0" required>
                </div>

                <div class="form-group">
                    <label>Logo Ekspedisi</label>
                    <input type="file" name="logo_ekspedisi" class="form-control">
                </div>

                <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
        </div>
    </div>
</div>
@endsection